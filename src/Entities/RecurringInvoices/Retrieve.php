<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\RecurringInvoices;

class Retrieve extends Base {

	public function exists() :bool {
		return !is_null( $this->retrieve() );
	}

	public function retrieve() :RecurringInvoiceVO {
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
}