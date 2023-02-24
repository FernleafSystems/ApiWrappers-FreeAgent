<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use Elliotchance\Iterator\AbstractPagedIterator;
use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

abstract class CommonIterator extends AbstractPagedIterator {

	use ConnectionConsumer;

	public const PAGE_LIMIT = RetrievePageBase::PER_PAGE_LIMIT_UPPER;

	/**
	 * @var RetrievePageBase
	 */
	private $pageRetriever;

	/**
	 * @var int
	 */
	protected $nTotalSize;

	/**
	 * @param int $ts
	 */
	public function filterByDateFrom( $ts ) :self {
		$this->getRetriever()->filterByDateFrom( $ts );
		return $this;
	}

	/**
	 * @param int $ts
	 */
	public function filterByDateTo( $ts ) :self {
		$this->getRetriever()->filterByDateTo( $ts );
		return $this;
	}

	/**
	 * @param int $nDateTs
	 * @param int $nRadius
	 */
	public function filterByDateRange( $nDateTs, $nRadius = 5 ) :self {
		$nDaysRadius = 86400*$nRadius;
		return $this->filterByDateFrom( $nDateTs - $nDaysRadius )
					->filterByDateTo( $nDateTs + $nDaysRadius );
	}

	/**
	 * @param $ts
	 */
	public function filterByDateUpdatedSince( $ts ) :self {
		$this->getRetriever()->filterByDateUpdatedSince( $ts );
		return $this;
	}

	public function filterByView( string $view ) :self {
		$this->getRetriever()->filterByView( $view );
		return $this;
	}

	public function filterByView_All() :self {
		$this->getRetriever()->filterByView_All();
		return $this;
	}

	/**
	 * @param string $field
	 */
	public function orderBy( $field, bool $descendingOrder = false ) :self {
		$this->getRetriever()->setRequestDataItem( 'sort', ( $descendingOrder ? '-' : '' ).$field );
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTotalSize() {
		if ( !isset( $this->nTotalSize ) ) {
			$r = $this->getRetriever();
			$r->retrieve( 1, 1 );
			$count = $r->getLastApiResponse()->getHeader( 'X-Total-Count' );
			$this->nTotalSize = (int)array_shift( $count );
		}
		return $this->nTotalSize;
	}

	/**
	 * @param int $pageNumber
	 * @return EntityVO[]|array
	 */
	public function getPage( $pageNumber ) {
		return $this->getRetriever()->retrieve( $pageNumber, $this->getPageSize() );
	}

	public function getRetriever() :RetrievePageBase {
		return $this->pageRetriever ??
			   $this->pageRetriever = $this->getNewRetriever()->setConnection( $this->getConnection() );
	}

	abstract protected function getNewRetriever() :RetrievePageBase;

	/**
	 * @return int
	 */
	public function getPageSize() {
		return static::PAGE_LIMIT;
	}

	public function rewind() {
		parent::rewind();
		unset( $this->nTotalSize );
	}
}