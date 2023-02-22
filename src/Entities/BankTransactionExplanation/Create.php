<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts\BankAccountVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions\BankTransactionVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\BillVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\InvoiceVO;

class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @return BankTransactionExplanationVO|null
	 */
	public function create() {

		$sDescription = $this->getRequestDataItem( 'description' );
		if ( empty( $sDescription ) ) {
			$this->setDescription( 'Filler description for Bank Transaction Explanation.' );
		}
		return $this->sendRequestWithVoResponse();
	}

	/**
	 * @param string $sAssociatedTo
	 * @param int    $sAssociatedId
	 * @return $this
	 */
	public function setAssociatedPaidTo( $sAssociatedTo, $sAssociatedId ) {
		return $this->setRequestDataItem( 'paid_'.$sAssociatedTo, $sAssociatedId );
	}

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->removeRequestDataItem( 'bank_transaction' )
					->setRequestDataItem( 'bank_account', $oBankAccount->url );
	}

	/**
	 * @param BankTransactionVO $txn
	 * @return $this
	 */
	public function setBankTxn( $txn ) {
		return $this->removeRequestDataItem( 'bank_account' )
					->setRequestDataItem( 'bank_transaction', $txn->url )
					->setDatedOn( $txn->dated_on );
	}

	/**
	 * @param BillVO $bill
	 * @return $this
	 */
	public function setBillPaid( $bill ) {
		return $this->removeRequestDataItem( 'paid_invoice' )
					->setAssociatedPaidTo( 'bill', $bill->url );
	}

	/**
	 * @param InvoiceVO $invoice
	 * @return $this
	 */
	public function setInvoicePaid( $invoice ) {
		return $this->removeRequestDataItem( 'paid_bill' )
					->setAssociatedPaidTo( 'invoice', $invoice->url );
	}

	/**
	 * @param string $sDesc
	 * @return $this
	 */
	public function setDescription( $sDesc ) {
		return $this->setRequestDataItem( 'description', $sDesc );
	}

	/**
	 * @param string $sDesc
	 * @return $this
	 */
	public function setCategory( $sDesc ) {
		return $this->setRequestDataItem( 'category', $sDesc );
	}

	/**
	 * @param int $nValue
	 * @return $this
	 */
	public function setForeignCurrencyValue( $nValue ) {
		return $this->setRequestDataItem( 'foreign_currency_value', $nValue );
	}

	/**
	 * @param float $nValue
	 * @return $this
	 */
	public function setValue( $nValue ) {
		return $this->setRequestDataItem( 'gross_value', $nValue );
	}
}