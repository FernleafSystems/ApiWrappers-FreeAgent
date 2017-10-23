<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class BankTransactionVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction
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
}