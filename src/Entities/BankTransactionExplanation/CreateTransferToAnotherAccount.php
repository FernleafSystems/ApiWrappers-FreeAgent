<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts\BankAccountVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class CreateTransferToAnotherAccount extends Create {

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setTargetBankAccount( $oBankAccount ) {
		return $this->setRequestDataItem( 'transfer_bank_account', $oBankAccount->getUri() );
	}
}