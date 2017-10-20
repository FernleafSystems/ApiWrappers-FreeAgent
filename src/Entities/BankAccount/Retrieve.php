<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount
 */
class Retrieve extends Api {

	/**
	 * @param int $nId
	 * @return BankAccountVO|null
	 */
	public function asVo( $nId ) {
		$aData = $this->retrieve( $nId );
		return !empty( $aData ) ? ( new BankAccountVO() )->applyFromArray( $aData ) : null;
	}

	/**
	 * @param int $nId
	 * @return array
	 */
	public function retrieve( $nId ) {
		return $this->getFreeagentApi()
					->getBankAccount( $nId )->array;
	}
}