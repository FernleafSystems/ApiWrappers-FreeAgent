<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\FindBase;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction
 */
class Find extends FindBase {

	/**
	 * @return BankTransactionVO[]
	 */
	public function find() {
		$aBills = array();
		$oResult = $this->getFreeagentApi()
						->getBankTransactionsAlt( $this->getParams() );

		if ( $oResult->success && !empty( $oResult->array ) ) {
			$aBills = array_map(
				function ( $aBill ) {
					return ( new BankTransactionVO() )->applyFromArray( $aBill );
				},
				$oResult->array
			);
		}

		return $aBills;
	}

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->setParam( 'bank_account', $oBankAccount->getUri() );
	}

	/**
	 * @param string $sView all, unexplained, manual, imported, explained
	 * @return $this
	 */
	public function setView( $sView = 'all' ) {
		return $this->setParam( 'view', $sView );
	}
}