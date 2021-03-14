<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

/**
 * Trait BankTransactionExplanationTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
trait BankTransactionExplanationTrait {

	protected function getApiEndpoint() :string {
		return 'bank_transaction_explanations';
	}

	public function getVO() :BankTransactionExplanationVO {
		return new BankTransactionExplanationVO();
	}
}