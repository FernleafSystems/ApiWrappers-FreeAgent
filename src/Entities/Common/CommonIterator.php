<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use Elliotchance\Iterator\AbstractPagedIterator;
use FernleafSystems\ApiWrappers\Base\ConnectionConsumer;

/**
 * Class CommonIterator
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 */
abstract class CommonIterator extends AbstractPagedIterator {

	use ConnectionConsumer;
	const PAGE_LIMIT = RetrievePageBase::PER_PAGE_LIMIT_UPPER;

	/**
	 * @var RetrievePageBase
	 */
	private $oPageRetriever;

	/**
	 * @var int
	 */
	protected $nTotalSize;

	/**
	 * @param $nTimestamp
	 * @return $this
	 */
	public function filterByDateFrom( $nTimestamp ) {
		$this->getRetriever()
			 ->filterByDateFrom( $nTimestamp );
		return $this;
	}

	/**
	 * @param $nTimestamp
	 * @return $this
	 */
	public function filterByDateTo( $nTimestamp ) {
		$this->getRetriever()
			 ->filterByDateTo( $nTimestamp );
		return $this;
	}

	/**
	 * @param $nTimestamp
	 * @return $this
	 */
	public function filterByDateUpdatedSince( $nTimestamp ) {
		$this->getRetriever()
			 ->filterByDateUpdatedSince( $nTimestamp );
		return $this;
	}

	/**
	 * @param string $sView
	 * @return $this;
	 */
	public function filterByView( $sView ) {
		$this->getRetriever()
			 ->filterByView( $sView );
		return $this;
	}

	/**
	 * @return $this;
	 */
	public function filterByView_All() {
		$this->getRetriever()
			 ->filterByView_All();
		return $this;
	}

	/**
	 * @param bool $bDescendingOrder
	 * @return $this
	 */
	public function orderBy( $sField, $bDescendingOrder = false ) {
		$sPrefix = $bDescendingOrder ? '-' : '';
		$this->getRetriever()->setRequestDataItem( 'sort', $sPrefix.$sField );
		return $this;
	}

	/**
	 * @return int
	 */
	public function getTotalSize() {
		if ( !isset( $this->nTotalSize ) ) {
			$oRtr = $this->getRetriever();
			$oRtr->retrieve( 1, 1 );
			$aCount = $oRtr->getLastApiResponse()
						   ->getHeader( 'X-Total-Count' );
			$this->nTotalSize = (int)array_shift( $aCount );
		}
		return $this->nTotalSize;
	}

	/**
	 * @param int $nPage
	 * @return EntityVO[]|array
	 */
	public function getPage( $nPage ) {
		return $this->getRetriever()->retrieve( $nPage, $this->getPageSize() );
	}

	/**
	 * @return RetrievePageBase
	 */
	protected function getRetriever() {
		if ( !$this->oPageRetriever instanceof RetrievePageBase ) {
			$this->oPageRetriever = $this->getNewRetriever()
										 ->setConnection( $this->getConnection() );
		}
		return $this->oPageRetriever;
	}

	/**
	 * @return RetrievePageBase
	 */
	abstract protected function getNewRetriever();

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