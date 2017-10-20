<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction\BankTransactionVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\BillVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RequestBase;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\InvoiceVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation
 */
class Create extends RequestBase {

	/**
	 * @return BankTransactionExplanationVO|null
	 */
	public function create() {

		$aParams = $this->getParams();
		if ( empty( $aParams[ 'description' ] ) ) {
			$this->setDescription( 'Filler description for Bank Transaction Explanation.' );
		}

		$oResult = $this->getFreeagentApi()
						->createBankTransactionExplanationAlt( $this->getParams() );

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
		return $this->setParam( 'paid_' . $sAssociatedTo, $sAssociatedId );
	}

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->unsetParam( 'bank_transaction' )
					->setParam( 'bank_account', $oBankAccount->getUri() );
	}

	/**
	 * @param BankTransactionVO $oBankTxn
	 * @return $this
	 */
	public function setBankTxn( $oBankTxn ) {
		return $this->unsetParam( 'bank_account' )
					->setParam( 'bank_transaction', $oBankTxn->getUri() )
					->setDatedOn( $oBankTxn->getDatedOn() );
	}

	/**
	 * @param BillVO $oBill
	 * @return $this
	 */
	public function setBillPaid( $oBill ) {
		return $this->unsetParam( 'paid_invoice' )
					->setAssociatedPaidTo( 'bill', $oBill->getUri() );
	}

	/**
	 * @param InvoiceVO $oInvoice
	 * @return $this
	 */
	public function setInvoicePaid( $oInvoice ) {
		return $this->unsetParam( 'paid_bill' )
					->setAssociatedPaidTo( 'invoice', $oInvoice->getUri() );
	}

	/**
	 * @param string $sDesc
	 * @return $this
	 */
	public function setDescription( $sDesc ) {
		return $this->setParam( 'description', $sDesc );
	}

	/**
	 * @param string $sDesc
	 * @return $this
	 */
	public function setCategory( $sDesc ) {
		return $this->setParam( 'category', $sDesc );
	}

	/**
	 * @param int $nValue
	 * @return $this
	 */
	public function setForeignCurrencyValue( $nValue ) {
		return $this->setParam( 'foreign_currency_value', $nValue );
	}

	/**
	 * @param float $nValue
	 * @return $this
	 */
	public function setValue( $nValue ) {
		return $this->setParam( 'gross_value', $nValue );
	}
}