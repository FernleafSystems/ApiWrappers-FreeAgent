<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

/**
 * Trait BankTransactionsTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 */
trait BankTransactionsTrait {

	/**
	 * @var string
	 */
	protected $aApiEndpoint = 'bank_transactions';

	/**
	 * @return BankTransactionVO
	 */
	public function getVO() {
		return new BankTransactionVO();
	}
}