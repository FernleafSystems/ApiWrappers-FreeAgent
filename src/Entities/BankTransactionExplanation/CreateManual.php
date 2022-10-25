<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

class CreateManual extends Create {

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		$sTxn = $this->getRequestDataItem( 'bank_transaction' );
		if ( !empty( $sTxn ) ) {
			throw new \Exception( 'Trying to create a manual transaction explanation with a bank transaction specified' );
		}
	}
}