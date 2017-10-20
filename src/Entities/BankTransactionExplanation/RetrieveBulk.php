<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RequestBase;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class RetrieveBulk extends RequestBase {

	/**
	 * @return BankTransactionExplanationVO[]|null
	 */
	public function retrieve() {
		$aExplanations = null;
		$oResult = $this->getFreeagentApi()
						->getBankTransactionExplanations( $this->getParams() );
		if ( $oResult->success ) {
			$aExplanations = array_map(
				function ( $aExplanation ) {
					return ( new BankTransactionExplanationVO() )->applyFromArray( $aExplanation );
				},
				$oResult->array
			);
		}
		return $aExplanations;
	}

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->setParam( 'bank_account', $oBankAccount->getUri() );
	}
}