<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\ApiWrappers\Freeagent\Entities;

/**
 * Class BankTransactionsIterator
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 */
class BankTransactionsIterator extends Entities\Common\CommonIterator {

	/**
	 * @param Entities\BankAccounts\BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function filterByBankAccount( $oBankAccount ) {
		$this->getRetriever()
			 ->setRequestDataItem( 'bank_account', $oBankAccount->getUri() );
		return $this;
	}

	/**
	 * @return $this
	 */
	public function filterByExplained() {
		return $this->filterByView( 'explained' );
	}

	/**
	 * @return $this
	 */
	public function filterByImported() {
		return $this->filterByView( 'imported' );
	}

	/**
	 * @return $this
	 */
	public function filterByManual() {
		return $this->filterByView( 'manual' );
	}

	/**
	 * @return $this
	 */
	public function filterByMarkedForReview() {
		return $this->filterByView( 'marked_for_review' );
	}

	/**
	 * @return $this
	 */
	public function filterByUnexplained() {
		return $this->filterByView( 'unexplained' );
	}

	/**
	 * @return BankTransactionVO
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