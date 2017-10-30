<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 */
class RetrieveBulk extends RetrieveBulkBase {

	const REQUEST_ENDPOINT = 'bank_transactions';

	/**
	 * @return BankTransactionVO
	 */
	public function getNewEntityResourceVO() {
		return new BankTransactionVO();
	}
}