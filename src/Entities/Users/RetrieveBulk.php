<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
class RetrieveBulk extends RetrieveBulkBase {

	const REQUEST_ENDPOINT = 'users';

	/**
	 * @return UserVO
	 */
	public function getNewEntityResourceVO() {
		return new UserVO();
	}
}