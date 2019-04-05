<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts;

/**
 * Trait BankAccountsTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts
 */
trait BankAccountsTrait {

	/**
	 * @var string
	 */
	protected $aApiEndpoint = 'bank_accounts';

	/**
	 * @return BankAccountVO
	 */
	public function getVO() {
		return new BankAccountVO();
	}
}