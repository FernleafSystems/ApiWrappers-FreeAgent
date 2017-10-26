<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class RetrieveBulk extends RetrieveBulkBase {

	const REQUEST_ENDPOINT = 'bills';

	/**
	 * @return BillVO
	 */
	public function getNewEntityResourceVO() {
		return new BillVO();
	}
}