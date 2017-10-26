<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class RetrieveBulkBase
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 */
class RetrieveBulkBase extends Api {

	/**
	 * @param int $nStartPage
	 * @param int $nPerPage
	 * @return EntityVO[]|EntityVO
	 */
	public function run( $nStartPage = 1, $nPerPage = 100 ) {

		$this->setPage( $nStartPage )
			 ->setPerPage( $nPerPage );

		$aMergedResults = array();

		do {
			$aResultsData = $this->send()->getCoreResponseData();
			$nCountResult = count( $aResultsData );

			$aResultsData = array_map(
				function ( $aResultItem ) {
					return $this->getNewEntityResourceVO()
								->applyFromArray( $aResultItem );
				},
				$this->filterItemsFromResults( $aResultsData )
			);

			if ( !empty( $aResultsData ) ) {
				$aMergedResults = array_merge( $aMergedResults, $aResultsData );
			}

			// Allows us to search for 1 item, or multiple items
			$nCountCurrentResults = count( $aMergedResults );
			if ( $this->hasResultsLimit() && $nCountCurrentResults >= $this->getResultsLimit() ) {
				break;
			}

			$this->setNextPage();

		} while ( $nCountResult == $nPerPage );

		return $aMergedResults;
	}

	/**
	 * By default we return as-is
	 * Override this with search/find parameters and return items that match the filter.
	 *
	 * This can be used to search for an individual record with a results limit of 1.
	 * @param array[] $aResultSet
	 * @return array[]
	 */
	protected function filterItemsFromResults( $aResultSet ) {
		return $aResultSet;
	}

	/**
	 * @return int
	 */
	protected function getPage() {
		$nPage = $this->getRequestDataItem( 'page' );
		if ( empty( $nPage ) ) {
			$nPage = 1;
		}
		return $nPage;
	}

	/**
	 * @return int
	 */
	protected function getResultsLimit() {
		return (int)$this->getNumericParam( 'retrieve_results_limit', 0 );
	}

	/**
	 * @return bool
	 */
	protected function hasResultsLimit() {
		return ( $this->getResultsLimit() > 0 );
	}

	/**
	 * @return $this
	 */
	protected function setNextPage() {
		$nNext = $this->getPage() + 1;
		return $this->setPage( $nNext );
	}

	/**
	 * @var int $nLimit 0 == no limit
	 * @return $this
	 */
	public function setResultsLimit( $nLimit = 0 ) {
		return $this->setParam( 'retrieve_results_limit', $nLimit );
	}

	/**
	 * @param int $nPage
	 * @return $this
	 */
	protected function setPage( $nPage = 1 ) {
		if ( $nPage < 1 ) {
			$nPage = 1;
		}
		return $this->setRequestDataItem( 'page', $nPage );
	}

	/**
	 * @param int $nPerPage
	 * @return $this
	 */
	protected function setPerPage( $nPerPage = 25 ) {
		if ( $nPerPage > 100 || $nPerPage < 1 ) {
			$nPerPage = 25;
		}
		return $this->setRequestDataItem( 'per_page', $nPerPage );
	}

	/**
	 * @param string $sViewFilter
	 * @return $this
	 */
	protected function setViewFilter( $sViewFilter ) {
		return $this->setRequestDataItem( 'view', $sViewFilter );
	}

	/**
	 * @return $this
	 */
	protected function setViewFilterAll() {
		return $this->setViewFilter( 'all' );
	}

	/**
	 * @return string
	 */
	protected function getDataPackageKey() {
		return $this->getRequestEndpoint(); // we don't truncate 's'
	}
}