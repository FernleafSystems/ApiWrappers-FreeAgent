<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Class Update
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class Update extends Create {

	const REQUEST_METHOD = 'put';

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( !$this->hasEntityId() ) {
			throw new \Exception( 'Attempting to make "update" API request without an Entity ID' );
		}
	}

	/**
	 * @param array $aUpdateData
	 * @return InvoiceVO|null
	 */
	public function update( $aUpdateData = array() ) {
		return $this->create( $aUpdateData );
	}
}