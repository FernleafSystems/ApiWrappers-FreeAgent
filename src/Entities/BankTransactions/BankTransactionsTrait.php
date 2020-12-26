<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

/**
 * Trait BankTransactionsTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 */
trait BankTransactionsTrait {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() :string {
		return 'bank_transactions';
	}

	/**
	 * @return BankTransactionVO
	 */
	public function getVO() {
		return new BankTransactionVO();
	}
}