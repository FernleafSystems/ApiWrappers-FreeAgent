<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

/**
 * Trait UsersTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
trait UsersTrait {

	/**
	 * @var string
	 */
	protected $aApiEndpoint = 'users';

	/**
	 * @return UserVO
	 */
	public function getVO() {
		return new UserVO();
	}
}