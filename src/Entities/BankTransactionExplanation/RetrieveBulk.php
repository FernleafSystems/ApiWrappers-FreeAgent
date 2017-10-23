<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class RetrieveBulk extends Base {

	/**
	 * @return BankTransactionExplanationVO[]|null
	 */
	public function retrieve() {
		$aExplanations = null;
		$aData = $this->send()
					  ->getCoreResponseData();
		if ( $aData ) {
			$aExplanations = array_map(
				function ( $aExplanation ) {
					return $this->getNewEntityResourceVO()
								->applyFromArray( $aExplanation );
				},
				$aData
			);
		}
		return $aExplanations;
	}

	/**
	 * @return string
	 */
	protected function getDataPackageKey() {
		return $this->getRequestEndpoint();
	}

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->setRequestDataItem( 'bank_account', $oBankAccount->getUri() );
	}
}