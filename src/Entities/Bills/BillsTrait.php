<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

/**
 * Trait BillsTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
trait BillsTrait {

	/**
	 * @var string
	 */
	protected $aApiEndpoint = 'bills';

	/**
	 * @return BillVO
	 */
	public function getVO() {
		return new BillVO();
	}
}