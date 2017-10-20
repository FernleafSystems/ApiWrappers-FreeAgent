<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

/**
 * Class CreateManual
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class CreateManual extends Create {

	/**
	 * @return BankTransactionExplanationVO|null
	 * @throws \Exception
	 */
	public function create() {
		$aParams = $this->getParams();
		if ( isset( $aParams[ 'bank_transaction' ] ) ) {
			throw new \Exception( 'Trying to create a manual transaction explanation with a bank transaction specified' );
		}

		return parent::create();
	}
}