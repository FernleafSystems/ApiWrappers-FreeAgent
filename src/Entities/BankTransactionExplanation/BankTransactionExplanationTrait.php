<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

/**
 * Trait BankTransactionExplanationTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
trait BankTransactionExplanationTrait {

	/**
	 * @var string
	 */
	protected $aApiEndpoint = 'bank_transaction_explanations';

	/**
	 * @return BankTransactionExplanationVO
	 */
	public function getVO() {
		return new BankTransactionExplanationVO();
	}
}