<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

trait BankTransactionsTrait {

	protected function getApiEndpoint() :string {
		return 'bank_transactions';
	}

	public function getVO():BankTransactionVO{
		return new BankTransactionVO();
	}
}