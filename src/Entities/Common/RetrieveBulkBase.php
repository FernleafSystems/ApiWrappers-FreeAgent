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

			if ( $this->isSearch() ) {
				// This allows us to run custom FIND operations on the individual
				// result sets from each page, without having to build the entire
				// population first, within which to then run a search.
				$mExtractedItem = $this->extractItemFromResults( $aResultsData );
				if ( !is_null( $mExtractedItem ) ) {
					return $mExtractedItem;
				}
			}
			else {
				$aMergedResults = array_merge(
					$aMergedResults,
					array_map(
						function ( $aResultItem ) {
							return $this->getNewEntityResourceVO()
										->applyFromArray( $aResultItem );
						},
						$aResultsData
					)
				);
			}

			$this->setNextPage();

		} while ( count( $aResultsData ) == $nPerPage );

		return $aMergedResults;
	}

	/**
	 * By default we return null as this is a retrieval service, not a search
	 * Override this with search/find parameters and return an item if found,
	 * null otherwise.
	 * @param array[] $aResultSet
	 * @return EntityVO|null
	 */
	protected function extractItemFromResults( $aResultSet ) {
		return null;
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
	 * @return bool
	 */
	protected function isSearch() {
		return (bool)$this->getParam( 'is_search', false );
	}

	/**
	 * @param bool $bIsSearch
	 * @return $this
	 */
	protected function setIsSearch( $bIsSearch ) {
		return $this->setParam( 'is_search', $bIsSearch );
	}

	/**
	 * @return $this
	 */
	protected function setNextPage() {
		$nNext = $this->getPage() + 1;
		return $this->setPage( $nNext );
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