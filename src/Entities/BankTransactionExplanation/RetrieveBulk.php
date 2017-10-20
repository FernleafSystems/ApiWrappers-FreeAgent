<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Api;
use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class RetrieveBulk extends Api {

	/**
	 * @return BankTransactionExplanationVO[]|null
	 */
	public function retrieve() {
		$aExplanations = null;
		$oResult = $this->getFreeagentApi()
						->getBankTransactionExplanations();
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
		return $this->setRequestDataItem( 'bank_account', $oBankAccount->getUri() );
	}
}