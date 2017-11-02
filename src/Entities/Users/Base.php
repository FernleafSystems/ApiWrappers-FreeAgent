<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
class Base extends Api {

	const REQUEST_ENDPOINT = 'users';

	/**
	 * @return UserVO
	 */
	public function getNewEntityResourceVO() {
		return new UserVO();
	}
}