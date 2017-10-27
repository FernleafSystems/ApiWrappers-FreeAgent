<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class BankTransactionExplanationVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class BankTransactionExplanationVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getBankAccountId() {
		return basename( $this->getStringParam( 'bank_account' ) );
	}

	/**
	 * @return string
	 */
	public function getBankTransactionId() {
		return basename( $this->getStringParam( 'bank_transaction' ) );
	}

	/**
	 * @return string YYYY-MM-DD
	 */
	public function getDatedOn() {
		return $this->getParam( 'dated_on' );
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->getNumericParam( 'description' );
	}

	/**
	 * @return string
	 */
	public function getEntryType() {
		return $this->getStringParam( 'entry_type' );
	}

	/**
	 * @return string
	 */
	public function getValue() {
		return $this->getStringParam( 'gross_value' );
	}

	/**
	 * @return string URI for BankAccounts
	 */
	public function getLinkedTransferAccount() {
		return $this->getStringParam( 'linked_transfer_account' );
	}

	/**
	 * @return string
	 */
	public function getLinkedTransferAccountId() {
		return basename( $this->getLinkedTransferAccount() );
	}

	/**
	 * @return string
	 */
	public function getLinkedTransferExplanation() {
		return $this->getStringParam( 'linked_transfer_explanation' );
	}

	/**
	 * @return string
	 */
	public function getLinkedTransferExplanationId() {
		return basename( $this->getLinkedTransferExplanation() );
	}

	/**
	 * @return bool
	 */
	public function isLinkedTransferExplanation() {
		return !empty( $this->getLinkedTransferExplanation() );
	}
}