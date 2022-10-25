<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Freeagent\Api;
use FernleafSystems\ApiWrappers\Freeagent\Entities;

/**
 * @property array $retrieval_filter_items
 * @property int   $retrieve_results_limit
 */
abstract class RetrieveBulkBase extends Api {

	const PER_PAGE_LIMIT_LOWER = 1;
	const PER_PAGE_LIMIT_UPPER = 100;

	/**
	 * Retrieve all records that match any provided filters
	 * @return EntityVO[]
	 */
	public function all() {
		return $this->setResultsLimit()
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
	 * @return EntityVO|mixed|null
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

		$aMergedResults = [];

		$nPerPage = $this->getPerPage(); // used in the loop so getting real value is critical
		do {
			$aResultsData = $this->send()->getCoreResponseData();

			$nCountResult = count( $aResultsData );

			$aResultsData = array_map(
				function ( $aResultItem ) {
					return $this->getVO()
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
		} while ( $nCountResult > 0 && $nCountResult == $nPerPage );

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

			$aFiltered = [];

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
		$filterItems = $this->retrieval_filter_items;
		if ( !$filterItems instanceof RetrievalFilterItems ) {
			$filterItems = new RetrievalFilterItems();
			$this->setFilterItems( $filterItems );
		}
		return $filterItems;
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

	protected function getResultsLimit() :int {
		return (int)$this->retrieve_results_limit;
	}

	protected function hasResultsLimit() :bool {
		return $this->getResultsLimit() > 0;
	}

	/**
	 * @return $this
	 */
	protected function setNextPage() {
		$nNext = $this->getPage() + 1;
		return $this->setPage( $nNext );
	}

	/**
	 * @return $this
	 * @var int $limit 0 == no limit
	 */
	public function setResultsLimit( $limit = 0 ) {
		$this->retrieve_results_limit = $limit;
		return $this;
	}

	/**
	 * @param int $page
	 * @return $this
	 */
	public function setPage( $page = 1 ) {
		if ( empty( $page ) || $page < 1 ) {
			$page = 1;
		}
		return $this->setRequestDataItem( 'page', $page );
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
	 * IMPORTANT: merges with existing filter items
	 * @param RetrievalFilterItems $oFilterItems
	 * @return $this
	 */
	public function addFilterItems( RetrievalFilterItems $oFilterItems ) {
		$oExisting = $this->getFilterItems();
		foreach ( $oExisting->getEqualityFilterItems() as $sItemKey => $mItemValue ) {
			$oFilterItems->setEqualityFilterItem( $sItemKey, $mItemValue );
		}
		return $this->setFilterItems( $oFilterItems );
	}

	/**
	 * IMPORTANT: Replaces all existing filter items
	 * @return $this
	 */
	public function setFilterItems( ?RetrievalFilterItems $filterItems ) {
		$this->retrieval_filter_items = $filterItems;
		return $this;
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
	 * @param Entities\Contacts\ContactVO $contact
	 * @return $this
	 */
	public function filterByContact( $contact ) {
		$item = ( new Entities\Common\RetrievalFilterItems() )
			->setEqualityFilterItem( 'contact', $contact->url );
		return $this->addFilterItems( $item );
	}

	/**
	 * @param Entities\Categories\CategoryVO $cat
	 * @return $this
	 */
	public function filterByCategory( $cat ) {
		$item = ( new Entities\Common\RetrievalFilterItems() )
			->setEqualityFilterItem( 'category', $cat->url );
		return $this->addFilterItems( $item );
	}

	/**
	 * @param int $nTimestamp Unix Timestamp
	 * @return $this
	 */
	public function filterByDateFrom( $nTimestamp ) {
		return $this->setRequestDataItem( 'from_date', $this->convertToStdDateFormat( $nTimestamp ) );
	}

	/**
	 * @param int $nTimestamp Unix Timestamp
	 * @return $this
	 */
	public function filterByDateTo( $nTimestamp ) {
		return $this->setRequestDataItem( 'to_date', $this->convertToStdDateFormat( $nTimestamp ) );
	}

	/**
	 * @param int $nTimestamp Unix Timestamp
	 * @return $this
	 */
	public function filterByDateUpdatedSince( $nTimestamp ) {
		return $this->setRequestDataItem( 'updated_since', $this->convertToStdDateFormat( $nTimestamp ) );
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

	protected function getRequestDataPayloadKey() :string {
		return $this->getApiEndpoint(); // we don't truncate 's'
	}
}