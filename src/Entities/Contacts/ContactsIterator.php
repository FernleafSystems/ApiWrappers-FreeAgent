<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Entities;

class ContactsIterator extends Entities\Common\CommonIterator {

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
	public function filterByActive() {
		return $this->filterByView( 'active' );
	}

	/**
	 * @return $this
	 */
	public function filterByClients() {
		return $this->filterByView( 'clients' );
	}

	/**
	 * @return $this
	 */
	public function filterByClientsWithOpenInvoices() {
		return $this->filterByView( 'open_clients' );
	}

	/**
	 * @return $this
	 */
	public function filterByHidden() {
		return $this->filterByView( 'hidden' );
	}

	/**
	 * @return $this
	 */
	public function filterBySuppliers() {
		return $this->filterByView( 'suppliers' );
	}

	/**
	 * @param bool $bDescendingOrder
	 * @return $this
	 */
	public function orderByName( $bDescendingOrder = false ) {
		return $this->orderBy( 'name', $bDescendingOrder );
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
	 * @return ContactVO
	 */
	public function current() {
		return parent::current();
	}

	protected function getNewRetriever() :RetrievePage {
		return new RetrievePage();
	}
}