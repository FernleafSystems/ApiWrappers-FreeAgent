<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class BankAccountVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts
 * @property string $account_number
 * @property string $currency
 * @property float  $current_balance
 * @property float  $opening_balance
 * @property string $iban
 * @property string $name
 * @property string $sort_code
 * @property string $status - active or hidden
 * @property bool   $is_primary
 * @property string $type - StandardBankAccount, PaypalAccount, CreditCardAccount
 * @property string $latest_activity_date - YYYY-MM-DD
 */
class BankAccountVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getAccountNumber() {
		return $this->account_number;
	}

	/**
	 * @return string
	 */
	public function getCurrency() {
		return $this->currency;
	}

	/**
	 * @return float
	 */
	public function getCurrentBalance() {
		return $this->current_balance;
	}

	/**
	 * @return string
	 */
	public function getIban() {
		return $this->iban;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getSortCode() {
		return $this->sort_code;
	}

	/**
	 * @return string active / hidden
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return bool
	 */
	public function isPrimary() {
		return (bool)$this->is_primary;
	}
}