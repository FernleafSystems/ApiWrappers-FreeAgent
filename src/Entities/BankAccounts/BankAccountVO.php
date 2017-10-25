<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class BankAccountVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts
 */
class BankAccountVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getAccountNumber() {
		return $this->getNumericParam( 'account_number' );
	}

	/**
	 * @return string
	 */
	public function getIban() {
		return $this->getNumericParam( 'iban' );
	}

	/**
	 * @return string
	 */
	public function getCurrency() {
		return $this->getStringParam( 'currency' );
	}

	/**
	 * @return string
	 */
	public function getCurrentBalance() {
		return $this->getStringParam( 'current_balance' );
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getStringParam( 'name' );
	}

	/**
	 * @return string
	 */
	public function getSortCode() {
		return $this->getNumericParam( 'sort_code' );
	}

	/**
	 * @return string active / hidden
	 */
	public function getStatus() {
		return $this->getStringParam( 'status' );
	}

	/**
	 * @return bool
	 */
	public function isPrimary() {
		return (bool)$this->getParam( 'is_primary' );
	}
}