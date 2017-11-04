<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 */
class Retrieve extends Base {

	/**
	 * @return bool
	 */
	public function exists() {
		return !is_null( $this->retrieve() );
	}

	/**
	 * @return BankTransactionVO
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
			throw new \Exception( 'Attempting to make API request to retrieve without an Entity ID' );
		}
	}
}