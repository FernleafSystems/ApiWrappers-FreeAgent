<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

/**
 * Class RetrieveMe
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
class RetrieveMe extends RetrieveBulk {

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		$this->setEntityId( 'me' ); // TODO: there needs to be a pre-send process.
	}

	/**
	 * @return string
	 */
	protected function getDataPackageKey() {
		return $this->getRequestEndpoint(); // we don't truncate 's'
	}
}