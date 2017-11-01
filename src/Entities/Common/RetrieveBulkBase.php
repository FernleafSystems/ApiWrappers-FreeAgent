<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class RetrieveBulkBase
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 */
class RetrieveBulkBase extends Api {

	const PER_PAGE_LIMIT_LOWER = 1;
	const PER_PAGE_LIMIT_UPPER = 100;

	/**
	 * Retrieve all records that match any provided filters
	 * @return EntityVO[]
	 */
	public function all() {
		return $this->setResultsLimit( 0 )
					->run();
	}

	/**
	 * Retrieve all records without any filters
	 * @return EntityVO[]
	 */
	public function allNoFilters() {
		return $this->clearFilters()
					->all();
	}

	/**
	 * Run the Retrieval but returns the first result that matches any filters
	 * @return EntityVO|null
	 */
	public function first() {
		$aResults = $this->setResultsLimit( 1 )
						 ->run();
		return count( $aResults ) ? $aResults[ 0 ] : null;
	}

	/**
	 * @param int $nStartPage
	 * @param int $nPerPage
	 * @return EntityVO[]
	 */
	public function run( $nStartPage = null, $nPerPage = null ) {

		$this->setPage( $nStartPage )
			 ->setPerPage( $nPerPage );

		$aMergedResults = array();

		$nPerPage = $this->getPerPage(); // used in the loop so getting real value is critical
		do {
			$aResultsData = $this->send()->getCoreResponseData();
			$nCountResult = count( $aResultsData );

			$aResultsData = array_map(
				function ( $aResultItem ) {
					return $this->getNewEntityResourceVO()
								->applyFromArray( $aResultItem );
				}, // first filter using equality filters, then with other custom filters.
				$this->customFilterResults( $this->filterResultsWithEqualityFilters( $aResultsData ) )
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
	 * This can be used to search for an individual record with a results limit of 1.
	 * @param array[] $aResultSet
	 * @return array[]
	 */
	protected function customFilterResults( $aResultSet ) {
		return $aResultSet;
	}

	/**
	 * @param array[] $aResultSet
	 * @return array
	 */
	protected function filterResultsWithEqualityFilters( $aResultSet ) {

		$oFilterItems = $this->getFilterItems();
		if ( $oFilterItems->hasEqualityFilterItems() ) {

			$aFiltered = array();

			$aFilters = $oFilterItems->getEqualityFilterItems();
			foreach ( $aResultSet as $aRes ) {

				$bMatched = true;
				foreach ( $aFilters as $sKey => $mValueToMatch ) {
					$bMatched = $bMatched && isset( $aRes[ $sKey ] ) && ( $aRes[ $sKey ] == $mValueToMatch );
				}
				if ( $bMatched ) {
					$aFiltered[] = $aRes;
				}

				if ( $this->hasResultsLimit() && count( $aFiltered ) == $this->getResultsLimit() ) {
					break;
				}
			}

			$aResultSet = $aFiltered;
		}

		return $aResultSet;
	}

	/**
	 * @return $this
	 */
	public function clearFilters() {
		return $this->setFilterItems( null );
	}

	/**
	 * @return RetrievalFilterItems|null
	 */
	public function getFilterItems() {
		$oFilterItems = $this->getParam( 'retrieval_filter_items' );
		if ( !( $oFilterItems instanceof RetrievalFilterItems ) ) {
			$oFilterItems = new RetrievalFilterItems();
			$this->setFilterItems( $oFilterItems );
		}
		return $oFilterItems;
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
	protected function getPerPage() {
		return $this->getRequestDataItem( 'per_page' );
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
	public function setPage( $nPage = 1 ) {
		if ( empty( $nPage ) || $nPage < 1 ) {
			$nPage = 1;
		}
		return $this->setRequestDataItem( 'page', $nPage );
	}

	/**
	 * @param int $nPerPage
	 * @return $this
	 */
	public function setPerPage( $nPerPage = 25 ) {
		if ( empty( $nPerPage ) || $nPerPage > self::PER_PAGE_LIMIT_UPPER || $nPerPage < self::PER_PAGE_LIMIT_LOWER ) {
			$nPerPage = 25;
		}
		return $this->setRequestDataItem( 'per_page', $nPerPage );
	}

	/**
	 * @param RetrievalFilterItems $oFilterItems
	 * @return $this
	 */
	public function setFilterItems( $oFilterItems ) {
		return $this->setParam( 'retrieval_filter_items', $oFilterItems );
	}

	/**
	 * @param string $sViewFilter
	 * @return $this
	 */
	public function setViewFilter( $sViewFilter ) {
		return $this->setRequestDataItem( 'view', $sViewFilter );
	}

	/**
	 * @return $this
	 */
	public function setViewFilterAll() {
		return $this->setViewFilter( 'all' );
	}

	/**
	 * @param int $nTimestamp Unix Timestamp
	 * @return $this
	 */
	public function filterByDateFrom( $nTimestamp ) {
		return $this->setRequestDataItem( 'from_date', gmdate( 'Y-m-d', $nTimestamp ) );
	}

	/**
	 * @param int $nTimestamp Unix Timestamp
	 * @return $this
	 */
	public function filterByDateTo( $nTimestamp ) {
		return $this->setRequestDataItem( 'to_date', gmdate( 'Y-m-d', $nTimestamp ) );
	}

	/**
	 * @param int $nTimestamp Unix Timestamp
	 * @return $this
	 */
	public function filterByDateUpdatedSince( $nTimestamp ) {
		return $this->setRequestDataItem( 'updated_since', gmdate( 'Y-m-d', $nTimestamp ) );
	}

	/**
	 * @param int $nDate
	 * @param int $nRadius
	 * @return $this
	 */
	public function filterByDateRange( $nDate, $nRadius = 5 ) {
		$nDaysRadius = 86400*$nRadius;
		return $this->filterByDateFrom( $nDate - $nDaysRadius )
					->filterByDateTo( $nDate + $nDaysRadius );
	}

	/**
	 * @return string
	 */
	protected function getDataPackageKey() {
		return $this->getRequestEndpoint(); // we don't truncate 's'
	}
}