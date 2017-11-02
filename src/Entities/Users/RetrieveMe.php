<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

/**
 * Class RetrieveMe
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
class RetrieveMe extends Base {

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		$this->setEntityId( 'me' ); // TODO: there needs to be a pre-send process.
	}
}