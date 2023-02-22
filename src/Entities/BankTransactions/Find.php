<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts\BankAccountVO;

class Find extends RetrieveBulk {

	/**
	 * @param BankAccountVO $bankAccount
	 * @return $this
	 */
	public function setBankAccount( $bankAccount ) {
		return $this->setRequestDataItem( 'bank_account', $bankAccount->url );
	}

	/**
	 * @return $this
	 */
	public function filterByExplained() {
		return $this->setViewFilter( 'explained' );
	}

	/**
	 * @return $this
	 */
	public function filterByImported() {
		return $this->setViewFilter( 'imported' );
	}

	/**
	 * @return $this
	 */
	public function filterByManual() {
		return $this->setViewFilter( 'manual' );
	}

	/**
	 * @return $this
	 */
	public function filterByMarkedForReview() {
		return $this->setViewFilter( 'marked_for_review' );
	}

	/**
	 * @return $this
	 */
	public function filterByUnexplained() {
		return $this->setViewFilter( 'unexplained' );
	}
}