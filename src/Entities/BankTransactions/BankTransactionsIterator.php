<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\ApiWrappers\Freeagent\Entities;

class BankTransactionsIterator extends Entities\Common\CommonIterator {

	public function filterByBankAccount( Entities\BankAccounts\BankAccountVO $bankAccount ) :self {
		$this->getRetriever()
			 ->setRequestDataItem( 'bank_account', $bankAccount->url );
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