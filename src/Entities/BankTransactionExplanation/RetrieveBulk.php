<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts\BankAccountVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

class RetrieveBulk extends RetrieveBulkBase {

	use BankTransactionExplanationTrait;

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->setRequestDataItem( 'bank_account', $oBankAccount->url );
	}
}