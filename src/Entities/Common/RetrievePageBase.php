<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Freeagent\Api;
use FernleafSystems\ApiWrappers\Freeagent\Entities;

abstract class RetrievePageBase extends Api {

	public const PER_PAGE_LIMIT_LOWER = 1;
	public const PER_PAGE_LIMIT_UPPER = 100;

	/**
	 * @param int $page
	 * @param int $perPage
	 * @return EntityVO[]|array
	 */
	public function retrieve( $page, $perPage = self::PER_PAGE_LIMIT_UPPER ) :array {
		try {
			$results = array_map(
				fn( $result ) => $this->getVO()->applyFromArray( $result ),
				$this->setPage( $page )
					 ->setPerPage( $perPage )
					 ->send()
					 ->getCoreResponseData()
			);
		}
		catch ( \Exception $e ) {
			$results = [];
		}
		return $results;
	}

	/**
	 * @param int $page
	 */
	public function setPage( $page = 1 ) :self {
		return $this->setRequestDataItem( 'page', max( 1, $page + 1 ) ); //because pages start at 0
	}

	/**
	 * @param int $perPage
	 */
	public function setPerPage( $perPage = 25 ) :self {
		return $this->setRequestDataItem(
			'per_page',
			min( max( (int)$perPage, self::PER_PAGE_LIMIT_LOWER ), self::PER_PAGE_LIMIT_UPPER )
		);
	}

	/**
	 * @param string $viewFilter
	 */
	public function filterByView( $viewFilter ) :self {
		return $this->setRequestDataItem( 'view', $viewFilter );
	}

	public function filterByView_All() :self {
		return $this->filterByView( 'all' );
	}

	/**
	 * @param int $ts Unix Timestamp
	 */
	public function filterByDateFrom( $ts ) :self {
		return $this->setRequestDataItem( 'from_date', $this->convertToStdDateFormat( $ts ) );
	}

	/**
	 * @param int $ts Unix Timestamp
	 */
	public function filterByDateTo( $ts ) :self {
		return $this->setRequestDataItem( 'to_date', $this->convertToStdDateFormat( $ts ) );
	}

	/**
	 * @param int $ts Unix Timestamp
	 */
	public function filterByDateUpdatedSince( $ts ) :self {
		return $this->setRequestDataItem( 'updated_since', $this->convertToStdDateFormat( $ts ) );
	}

	/**
	 * @param int $date
	 * @param int $radius
	 */
	public function filterByDateRange( $date, $radius = 5 ) :self {
		$daysRadius = 86400*$radius;
		return $this->filterByDateFrom( $date - $daysRadius )
					->filterByDateTo( $date + $daysRadius );
	}

	protected function getRequestDataPayloadKey() :string {
		return $this->getApiEndpoint(); // we don't truncate 's'
	}
}