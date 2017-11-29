<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class Find extends RetrieveBulk {

	/**
	 * @param ContactVO $oContact
	 * @return $this
	 */
	public function filterByContact( $oContact ) {
		return $this->setRequestDataItem( 'contact', $oContact->getUri() );
	}

	/**
	 * @return $this
	 */
	public function filterByDraft() {
		return $this->setViewFilter( 'draft' );
	}

	/**
	 * @param string $sStatus
	 * @return $this
	 */
	public function filterByEcStatus( $sStatus ) {
		$this->getFilterItems()
			 ->setEqualityFilterItem( 'ec_status', $sStatus );
		return $this;
	}

	/**
	 * @return $this
	 */
	public function filterByEcStatusVatMoss() {
		return $this->filterByEcStatus( 'EC VAT MOSS' );
	}

	/**
	 * @param int $nMonths
	 * @return $this
	 */
	public function filterByLastXMonths( $nMonths = 1 ) {
		return $this->setViewFilter( sprintf( 'last_%s_months', $nMonths ) );
	}

	/**
	 * @return $this
	 */
	public function filterByOpen() {
		return $this->setViewFilter( 'open' );
	}

	/**
	 * @return $this
	 */
	public function filterByOverdue() {
		return $this->setViewFilter( 'overdue' );
	}

	/**
	 * @return $this
	 */
	public function filterByOpenOverdue() {
		return $this->setViewFilter( 'open_or_overdue' );
	}

	/**
	 * @return $this
	 */
	public function filterByRecentOpenOverdue() {
		return $this->setViewFilter( 'recent_open_or_overdue' );
	}

	/**
	 * @param bool $bDescendingOrder
	 * @return $this
	 */
	public function sortByCreatedAt( $bDescendingOrder = false ) {
		$sPrefix = $bDescendingOrder ? '-' : '';
		return $this->setRequestDataItem( 'sort', $sPrefix.'created_at' );
	}

	/**
	 * @param bool $bDescendingOrder
	 * @return $this
	 */
	public function sortByUpdatedAt( $bDescendingOrder = false ) {
		$sPrefix = $bDescendingOrder ? '-' : '';
		return $this->setRequestDataItem( 'sort', $sPrefix.'updated_at' );
	}
}