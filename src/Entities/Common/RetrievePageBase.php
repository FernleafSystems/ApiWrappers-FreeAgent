<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Freeagent\Api;
use FernleafSystems\ApiWrappers\Freeagent\Entities;

/**
 * Class RetrieveBulkBase
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 */
abstract class RetrievePageBase extends Api {

	const PER_PAGE_LIMIT_LOWER = 1;
	const PER_PAGE_LIMIT_UPPER = 100;

	/**
	 * @param int $nPage
	 * @param int $nPerPage
	 * @return EntityVO[]|array
	 */
	public function retrieve( $nPage, $nPerPage = self::PER_PAGE_LIMIT_UPPER ) {
		$aResults = [];
		try {
			$this->setPage( $nPage )
				 ->setPerPage( $nPerPage )
				 ->send();
			$aResults = array_map(
				function ( $aResultItem ) {
					return $this->getVO()
								->applyFromArray( $aResultItem );
				},
				$this->getCoreResponseData()
			);
		}
		catch ( \Exception $oE ) {
		}

		return $aResults;
	}

	/**
	 * @param int $nPage
	 * @return $this
	 */
	public function setPage( $nPage = 1 ) {
		if ( empty( $nPage ) || $nPage < 1 ) {
			$nPage = 1;
		}
		return $this->setRequestDataItem( 'page', max( 1, (int)$nPage ) );
	}

	/**
	 * @param int $nPerPage
	 * @return $this
	 */
	public function setPerPage( $nPerPage = 25 ) {
		$nPerPage = min( max( (int)$nPerPage, self::PER_PAGE_LIMIT_LOWER ), self::PER_PAGE_LIMIT_LOWER );
		return $this->setRequestDataItem( 'per_page', $nPerPage );
	}

	/**
	 * @param string $sViewFilter
	 * @return $this
	 */
	public function filterByView( $sViewFilter ) {
		return $this->setRequestDataItem( 'view', $sViewFilter );
	}

	/**
	 * @return $this
	 */
	public function filterByView_All() {
		return $this->filterByView( 'all' );
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
	protected function getRequestDataPayloadKey() {
		return $this->getApiEndpoint(); // we don't truncate 's'
	}
}