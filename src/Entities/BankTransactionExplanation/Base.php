<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Base extends Api {

	const REQUEST_ENDPOINT = 'bank_transaction_explanations';

	/**
	 * @return BankTransactionExplanationVO
	 */
	public function getNewEntityResourceVO() {
		return new BankTransactionExplanationVO();
	}
}