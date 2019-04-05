<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

/**
 * Class Finder
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 */
class Finder extends BankTransactionsIterator {

	/**
	 * Ideally you would set other filter params on this if you're looking for a specific
	 * transaction - i.e. unexplained, within a date range
	 * @param string $sNetValue
	 * @return BankTransactionVO|null
	 */
	public function byNetValue( $sNetValue ) {
		$oTheOne = null;
		foreach ( $this as $oBankTxn ) {
			if ( (string)$oBankTxn == (string)$sNetValue ) {
				$oTheOne = $oBankTxn;
				break;
			}
		}
		return $oTheOne;
	}
}