<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

/**
 * Trait BillsTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
trait BillsTrait {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() {
		return 'bills';
	}

	/**
	 * @return BillVO
	 */
	public function getVO() {
		return new BillVO();
	}
}