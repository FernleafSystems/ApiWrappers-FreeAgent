<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
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