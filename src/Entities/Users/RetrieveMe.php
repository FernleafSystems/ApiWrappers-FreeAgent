<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

/**
 * Class RetrieveMe
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
class RetrieveMe extends Retrieve {
	/**
	 * @return UserVO
	 */
	public function retrieve() {
		return $this->setEntityId( 'me' )
					->sendRequestWithVoResponse();
	}
}