<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts\BankAccountVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class RetrieveBulk extends RetrieveBulkBase {

	const REQUEST_ENDPOINT = 'bank_transaction_explanations';

	/**
	 * @return BankTransactionExplanationVO
	 */
	public function getNewEntityResourceVO() {
		return new BankTransactionExplanationVO();
	}

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->setRequestDataItem( 'bank_account', $oBankAccount->getUri() );
	}
}