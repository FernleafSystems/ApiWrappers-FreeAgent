<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Base extends Api {

	const REQUEST_ENDPOINT = 'bills';

	/**
	 * @return BillVO
	 */
	public function getNewEntityResourceVO() {
		return new BillVO();
	}
}