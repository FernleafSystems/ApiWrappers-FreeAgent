<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts;

trait BankAccountsTrait {

	protected function getApiEndpoint() :string {
		return 'bank_accounts';
	}

	public function getVO() :BankAccountVO {
		return new BankAccountVO();
	}
}