<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Base extends Api {

	const REQUEST_ENDPOINT = 'bank_transactions';

	/**
	 * @return BankTransactionVO
	 */
	public function getNewEntityResourceVO() {
		return new BankTransactionVO();
	}
}