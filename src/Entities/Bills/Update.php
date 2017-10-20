<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Update
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Update extends Api {

	/**
	 * @param int   $nId
	 * @param array $aUpdateData
	 * @return bool
	 */
	public function update( $nId, $aUpdateData = array() ) {

		$oResult = $this->getFreeagentApi()
						->updateBill( $nId, $aUpdateData );

		return isset( $oResult->success ) && $oResult->success;
	}
}