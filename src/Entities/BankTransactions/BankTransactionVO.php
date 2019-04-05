<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation\BankTransactionExplanationVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class BankTransactionVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 * @property float   $amount
 * @property float   $unexplained_amount
 * @property string  $bank_account - URI
 * @property string  $dated_on     - YYYY-MM-DD
 * @property string  $description
 * @property string  $uploaded_at
 * @property bool    $is_manual
 * @property array[] $bank_transaction_explanations
 */
class BankTransactionVO extends EntityVO {

	/**
	 * @return float
	 */
	public function getAmountTotal() {
		return $this->amount;
	}

	/**
	 * @return float
	 */
	public function getAmountUnexplained() {
		return $this->unexplained_amount;
	}

	/**
	 * @return string
	 */
	public function getBankAccountId() {
		return basename( $this->bank_account );
	}

	/**
	 * @return string
	 */
	public function getDatedOn() {
		return $this->dated_on;
	}

	/**
	 * @return int
	 */
	public function getUploadedAt() {
		return strtotime( $this->uploaded_at );
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @return bool
	 */
	public function isManual() {
		return (bool)$this->is_manual;
	}

	/**
	 * @return BankTransactionExplanationVO[]
	 */
	public function getBankTransactionExplanations() {
		return array_map(
			function ( $aBTE ) {
				return ( new BankTransactionExplanationVO() )->applyFromArray( $aBTE );
			},
			$this->bank_transaction_explanations
		);
	}
}