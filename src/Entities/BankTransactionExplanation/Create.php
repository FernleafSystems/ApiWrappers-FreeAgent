<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Api;
use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction\BankTransactionVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\BillVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\InvoiceVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class Create extends Api {

	/**
	 * @return BankTransactionExplanationVO|null
	 */
	public function create() {

		$sDescription = $this->getParam( 'description' );
		if ( empty( $sDescription ) ) {
			$this->setDescription( 'Filler description for Bank Transaction Explanation.' );
		}

		$oResult = $this->getFreeagentApi()
						->createBankTransactionExplanationAlt();

		$oNew = null;
		if ( !empty( $oResult->array ) ) {
			$oNew = ( new BankTransactionExplanationVO() )->applyFromArray( $oResult->array );
		}
		return $oNew;
	}

	/**
	 * @param string $sAssociatedTo
	 * @param int    $sAssociatedId
	 * @return $this
	 */
	public function setAssociatedPaidTo( $sAssociatedTo, $sAssociatedId ) {
		return $this->setRequestDataItem( 'paid_' . $sAssociatedTo, $sAssociatedId );
	}

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->removeRequestDataItem( 'bank_transaction' )
					->setRequestDataItem( 'bank_account', $oBankAccount->getUri() );
	}

	/**
	 * @param BankTransactionVO $oBankTxn
	 * @return $this
	 */
	public function setBankTxn( $oBankTxn ) {
		return $this->removeRequestDataItem( 'bank_account' )
					->setRequestDataItem( 'bank_transaction', $oBankTxn->getUri() )
					->setDatedOn( $oBankTxn->getDatedOn() );
	}

	/**
	 * @param BillVO $oBill
	 * @return $this
	 */
	public function setBillPaid( $oBill ) {
		return $this->removeRequestDataItem( 'paid_invoice' )
					->setAssociatedPaidTo( 'bill', $oBill->getUri() );
	}

	/**
	 * @param InvoiceVO $oInvoice
	 * @return $this
	 */
	public function setInvoicePaid( $oInvoice ) {
		return $this->removeRequestDataItem( 'paid_bill' )
					->setAssociatedPaidTo( 'invoice', $oInvoice->getUri() );
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