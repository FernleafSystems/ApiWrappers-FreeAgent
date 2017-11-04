<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class Retrieve extends Base {

	/**
	 * @return bool
	 */
	public function exists() {
		return !is_null( $this->retrieve() );
	}

	/**
	 * @return InvoiceVO
	 */
	public function retrieve() {
		return $this->sendRequestWithVoResponse();
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( !$this->hasEntityId() ) {
			throw new \Exception( 'Attempting to make "retrieve" API request without an Entity ID' );
		}
	}

	/**
	 * @param bool $bInclude
	 * @return $this
	 */
	public function setIncludeLineItems( $bInclude = true ) {
		return $this->setRequestDataItem( 'nested_invoice_items', $bInclude ? 'true' : 'false' );
	}
}