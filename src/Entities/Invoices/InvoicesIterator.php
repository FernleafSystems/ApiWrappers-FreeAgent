<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent\Entities;

class InvoicesIterator extends Entities\Common\CommonIterator {

	/**
	 * @param Entities\Contacts\ContactVO $oContact
	 * @return $this
	 */
	public function filterByContact( $oContact ) {
		$this->getRetriever()
			 ->setRequestDataItem( 'contact', $oContact->getUri() );
		return $this;
	}

	/**
	 * @return $this
	 */
	public function filterByDraft() {
		return $this->filterByView( 'draft' );
	}

	/**
	 * @param int $nMonths
	 * @return $this
	 */
	public function filterByLastXMonths( $nMonths = 1 ) {
		return $this->filterByView( sprintf( 'last_%s_months', $nMonths ) );
	}

	/**
	 * @return $this
	 */
	public function filterByOpen() {
		return $this->filterByView( 'open' );
	}

	/**
	 * @return $this
	 */
	public function filterByOverdue() {
		return $this->filterByView( 'overdue' );
	}

	/**
	 * @return $this
	 */
	public function filterByOpenOverdue() {
		return $this->filterByView( 'open_or_overdue' );
	}

	/**
	 * @return $this
	 */
	public function filterByRecentOpenOverdue() {
		return $this->filterByView( 'recent_open_or_overdue' );
	}

	/**
	 * @param bool $bDescendingOrder
	 * @return $this
	 */
	public function orderByCreatedAt( $bDescendingOrder = false ) {
		return $this->orderBy( 'created_at', $bDescendingOrder );
	}

	/**
	 * @param bool $bDescendingOrder
	 * @return $this
	 */
	public function orderByUpdatedAt( $bDescendingOrder = false ) {
		return $this->orderBy( 'updated_at', $bDescendingOrder );
	}

	/**
	 * @return InvoiceVO
	 */
	public function current() {
		return parent::current();
	}

	/**
	 * @return RetrievePage
	 */
	protected function getNewRetriever() {
		return new RetrievePage();
	}
}