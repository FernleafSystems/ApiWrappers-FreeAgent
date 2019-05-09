<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class BankTransactionExplanationVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 * @property string bank_account                - URI
 * @property string bank_transaction            - URI
 * @property string linked_transfer_account     - URI
 * @property string linked_transfer_explanation - URI
 * @property string dated_on                    - YYYY-MM-DD
 * @property string description
 * @property float  gross_value
 * @property string entry_type
 */
class BankTransactionExplanationVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getBankAccountId() {
		return $this->getIdFromEntityUrl( $this->bank_account );
	}

	/**
	 * @return string
	 */
	public function getBankTransactionId() {
		return $this->getIdFromEntityUrl( $this->bank_transaction );
	}

	/**
	 * @return string
	 */
	public function getLinkedTransferAccountId() {
		return $this->getIdFromEntityUrl( $this->linked_transfer_account );
	}

	/**
	 * @return string
	 */
	public function getLinkedTransferExplanationId() {
		return $this->getIdFromEntityUrl( $this->linked_transfer_explanation );
	}

	/**
	 * @return bool
	 */
	public function isLinkedTransferExplanation() {
		return !empty( $this->linked_transfer_explanation );
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getDatedOn() {
		return $this->dated_on;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getEntryType() {
		return $this->entry_type;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getValue() {
		return $this->gross_value;
	}

	/**
	 * @return string URI for BankAccounts
	 * @deprecated
	 */
	public function getLinkedTransferAccount() {
		return $this->linked_transfer_account;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getLinkedTransferExplanation() {
		return $this->linked_transfer_explanation;
	}
}