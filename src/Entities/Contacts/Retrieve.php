<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Retrieve extends Base {

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