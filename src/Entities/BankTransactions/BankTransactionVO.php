<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class BankTransactionVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 */
class BankTransactionVO extends EntityVO {

	/**
	 * @return float
	 */
	public function getAmountTotal() {
		return $this->getNumericParam( 'amount' );
	}

	/**
	 * @return float
	 */
	public function getAmountUnexplained() {
		return $this->getNumericParam( 'unexplained_amount' );
	}

	/**
	 * @return string
	 */
	public function getBankAccountId() {
		return basename( $this->getStringParam( 'bank_account' ) );
	}

	/**
	 * @return string YYYY-MM-DD
	 */
	public function getDatedOn() {
		return $this->getParam( 'dated_on' );
	}

	/**
	 * @return int
	 */
	public function getUploadedAt() {
		return strtotime( $this->getParam( 'uploaded_at' ) );
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->getStringParam( 'description' );
	}

	/**
	 * @return bool
	 */
	public function isManual() {
		return (bool)$this->getParam( 'is_manual' );
	}
}