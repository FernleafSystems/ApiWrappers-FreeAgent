<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

/**
 * Class RetrieveMe
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
class RetrieveMe extends RetrieveBulk {

	/**
	 * @return UserVO
	 */
	public function retrieve() {
		return $this->setEntityId( 'me' )
					->first();
	}

	/**
	 * @return string
	 */
	protected function getDataPackageKey() {
		return $this->getRequestEndpoint(); // we don't truncate 's'
	}
}