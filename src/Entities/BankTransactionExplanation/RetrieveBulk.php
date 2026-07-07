<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts\BankAccountVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

class RetrieveBulk extends RetrieveBulkBase {

	use BankTransactionExplanationTrait;

	/**
	 * @param BankAccountVO $bankAccount
	 */
	public function setBankAccount( $bankAccount ) :self {
		return $this->setRequestDataItem( 'bank_account', $bankAccount->url );
	}

	public function setBankAccountFromID( int $id ) :self {
		return $this->setRequestDataItem( 'bank_account', $this->getConnection()->getBaseUrl().'/bank_account/'.$id );
	}

	protected function getCriticalRequestItems() :array {
		return [ 'bank_account' ];
	}
}