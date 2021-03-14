<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

/**
 * Trait UsersTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
trait UsersTrait {

	protected function getApiEndpoint() :string {
		return 'users';
	}

	public function getVO() :UserVO {
		return new UserVO();
	}
}