<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Update
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Update extends Api {

	/**
	 * @param int $nContactId
	 * @param array $aUpdateData
	 * @return bool
	 */
	public function update( $nContactId, $aUpdateData = array() ) {

		$oResult = $this->getFreeagentApi()
						->updateContact( $nContactId, $aUpdateData );

		return isset( $oResult->success ) && $oResult->success;
	}
}