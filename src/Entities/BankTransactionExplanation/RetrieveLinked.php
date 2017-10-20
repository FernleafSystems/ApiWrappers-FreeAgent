<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

/**
 * Class RetrieveLinked
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class RetrieveLinked extends Api {

	/**
	 * @param BankTransactionExplanationVO $oExplanation
	 * @return BankTransactionExplanationVO|null
	 */
	public function asVo( $oExplanation ) {
		return ( new Retrieve() )
			->setFreeagentApi( $this->getFreeagentApi() )
			->asVo( $oExplanation->getLinkedTransferExplanationId() );
	}
}