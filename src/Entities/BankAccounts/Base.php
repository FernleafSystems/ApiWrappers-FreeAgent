<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts
 */
class Base extends Api {

	const REQUEST_ENDPOINT = 'bank_accounts';

	/**
	 * @return BankAccountVO
	 */
	public function getNewEntityResourceVO() {
		return new BankAccountVO();
	}
}