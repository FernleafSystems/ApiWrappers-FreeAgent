<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities;

class BillsIterator extends Entities\Common\CommonIterator {

	/**
	 * @param Entities\Contacts\ContactVO $contact
	 * @return $this
	 */
	public function filterByContact( $contact ) {
		$this->getRetriever()
			 ->setRequestDataItem( 'contact', $contact->url );
		return $this;
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
	public function filterByOpenOrOverdue() {
		return $this->filterByView( 'open_or_overdue' );
	}

	/**
	 * @return $this
	 */
	public function filterByPaid() {
		return $this->filterByView( 'paid' );
	}

	/**
	 * @return $this
	 */
	public function filterByRecurring() {
		return $this->filterByView( 'recurring' );
	}

	/**
	 * @return BillVO
	 */
	public function current() {
		return parent::current();
	}

	protected function getNewRetriever() :RetrievePage {
		return new RetrievePage();
	}
}