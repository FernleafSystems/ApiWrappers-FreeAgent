<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts;

use FernleafSystems\ApiWrappers\Freeagent\Entities;

/**
 * Class BankAccountsIterator
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts
 */
class BankAccountsIterator extends Entities\Common\CommonIterator {

	/**
	 * @return $this
	 */
	public function filterByCreditCard() {
		return $this->filterByView( 'credit_card_accounts' );
	}

	/**
	 * @return $this
	 */
	public function filterByPaypal() {
		return $this->filterByView( 'paypal_accounts' );
	}

	/**
	 * @return $this
	 */
	public function filterByStandard() {
		return $this->filterByView( 'standard_bank_accounts' );
	}

	/**
	 * @return BankAccountVO
	 */
	public function current() {
		return parent::current();
	}

	/**
	 * @return RetrievePage
	 */
	protected function getNewRetriever() {
		return new RetrievePage();
	}
}