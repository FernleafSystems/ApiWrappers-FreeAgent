<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

/**
 * Class RetrieveLinked
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class RetrieveLinked extends Base {

	/**
	 * @param BankTransactionExplanationVO $oExplanation
	 * @return $this
	 */
	public function setExplanation( $oExplanation ) {
		return $this->setEntityId( $oExplanation->getLinkedTransferExplanationId() );
	}
}