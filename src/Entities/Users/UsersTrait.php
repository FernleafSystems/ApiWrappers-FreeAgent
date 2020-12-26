<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

/**
 * Trait UsersTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
trait UsersTrait {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() :string {
		return 'users';
	}

	/**
	 * @return UserVO
	 */
	public function getVO() {
		return new UserVO();
	}
}