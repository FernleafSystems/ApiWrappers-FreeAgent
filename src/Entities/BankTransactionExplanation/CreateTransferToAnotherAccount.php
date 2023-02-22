<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts\BankAccountVO;

class CreateTransferToAnotherAccount extends Create {

	/**
	 * @return $this
	 */
	public function setTargetBankAccount( BankAccountVO $bankAccount ) {
		return $this->setRequestDataItem( 'transfer_bank_account', $bankAccount->url );
	}
}