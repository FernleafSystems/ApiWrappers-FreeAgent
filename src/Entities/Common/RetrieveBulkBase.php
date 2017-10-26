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
	 * @return EntityVO[]
	 */
	public function run( $nStartPage = 1, $nPerPage = 100 ) {

		$this->setPage( $nStartPage )
			 ->setPerPage( $nPerPage );

		$aMergedResults = array();

		do {
			$nCurrentResultsCount = count( $aMergedResults );

			$aMergedResults = array_merge(
				$aMergedResults,
				array_map(
					function ( $aResultItem ) {
						return $this->getNewEntityResourceVO()
									->applyFromArray( $aResultItem );
					},
					$this->send()->getCoreResponseData()
				)
			);
			$this->setNextPage();

		} while ( $nCurrentResultsCount != count( $aMergedResults ) );

		return $aMergedResults;
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
	 * @return $this
	 */
	protected function setNextPage() {
		$nNext = $this->getPage() + 1;
		return $this->setPage( $nNext );
	}

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