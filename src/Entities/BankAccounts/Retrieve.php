<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts
 */
class Retrieve extends Base {

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