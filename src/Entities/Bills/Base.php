<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Base extends Freeagent\Api {

	const REQUEST_ENDPOINT = 'bills';

	/**
	 * @return BillVO
	 */
	public function getNewEntityResourceVO() {
		return new BillVO();
	}
}