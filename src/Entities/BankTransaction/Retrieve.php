<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction
 */
class Retrieve extends Api {

	/**
	 * @param int $nId
	 * @return BankTransactionVO|null
	 */
	public function asVo( $nId ) {
		$aData = $this->retrieve( $nId );
		return !empty( $aData ) ? ( new BankTransactionVO() )->applyFromArray( $aData ) : null;
	}

	/**
	 * @param int $nId
	 * @return array
	 */
	public function retrieve( $nId ) {
		$oResult = $this->getFreeagentApi()
						->getBankTransaction( $nId );
		return $oResult->array;
	}
}