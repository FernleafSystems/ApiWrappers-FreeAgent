<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Retrieve extends Api {

	/**
	 * @param int $nId
	 * @return BillVO|null
	 */
	public function asVo( $nId ) {
		$aData = $this->retrieve( $nId );
		return !empty( $aData ) ? ( new BillVO() )->applyFromArray( $aData ) : null;
	}

	/**
	 * @param int $nId
	 * @return array
	 */
	public function retrieve( $nId ) {
		return $this->getFreeagentApi()
					->getBill( $nId )->array;
	}
}