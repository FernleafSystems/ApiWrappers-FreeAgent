<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts;

/**
 * Trait BankAccountsTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts
 */
trait BankAccountsTrait {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() {
		return 'bank_accounts';
	}

	/**
	 * @return BankAccountVO
	 */
	public function getVO() {
		return new BankAccountVO();
	}
}