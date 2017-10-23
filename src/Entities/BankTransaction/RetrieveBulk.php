<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\FindBase;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction
 */
class RetrieveBulk extends FindBase {

	const REQUEST_ENDPOINT = 'bank_transactions';

	/**
	 * @return BankTransactionVO[]
	 */
	public function find() {
		$aBills = array();

		if ( $this->send()->isLastRequestSuccess() ) {
			$aBills = array_map(
				function ( $aBill ) {
					return ( new BankTransactionVO() )->applyFromArray( $aBill );
				},
				$this->getCoreResponseData()
			);
		}

		return $aBills;
	}

	/**
	 * @return string
	 */
	protected function getDataPackageKey() {
		return 'bank_transactions';
	}

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->setRequestDataItem( 'bank_account', $oBankAccount->getUri() );
	}

	/**
	 * @param string $sView all, unexplained, manual, imported, explained
	 * @return $this
	 */
	public function setView( $sView = 'all' ) {
		return $this->setRequestDataItem( 'view', $sView );
	}
}