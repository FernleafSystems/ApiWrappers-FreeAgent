<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Retrieve extends Api {

	const REQUEST_ENDPOINT = 'bills';

	/**
	 * @return BillVO|null
	 */
	public function asVoResponse() {
		$aData = $this->send()
					  ->getCoreResponseData();

		$oNew = null;
		if ( !empty( $aData ) ) {
			$oNew = ( new BillVO() )->applyFromArray( $aData );
		}
		return $oNew;
	}
}