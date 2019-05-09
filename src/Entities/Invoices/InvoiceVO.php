<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\Items\InvoiceItemVO;

/**
 * https://dev.freeagent.com/docs/invoices
 * Class InvoiceVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 * @property string  $contact  - URI
 * @property string  $dated_on - YYYY-MM-DD
 * @property string  $due_on   - YYYY-MM-DD
 * @property string  $paid_on  - YYYY-MM-DD
 * @property string  $reference
 * @property string  $place_of_supply
 * @property string  $status
 * @property string  $ec_status
 * @property array[] $invoice_items
 * @property float   $exchange_rate
 * @property float   $due_value
 * @property float   $net_value
 * @property float   $paid_value
 * @property float   $total_value
 * @property float   $sales_tax_value
 */
class InvoiceVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getContactId() {
		return $this->getIdFromEntityUrl( $this->contact );
	}

	/**
	 * @return InvoiceItemVO[]
	 */
	public function getItems() {
		return array_map(
			function ( $aItem ) {
				return ( new InvoiceItemVO() )->applyFromArray( $aItem );
			},
			$this->invoice_items
		);
	}

	/**
	 * @return bool
	 */
	public function isEcStatusUkNonEc() {
		return $this->isEcStatus( 'UK/Non-EC' );
	}

	/**
	 * @return bool
	 */
	public function isEcStatusGoods() {
		return $this->isEcStatus( 'EC Goods' );
	}

	/**
	 * @return bool
	 */
	public function isEcStatusServices() {
		return $this->isEcStatus( 'EC Services' );
	}

	/**
	 * @return bool
	 */
	public function isEcStatusVatMoss() {
		return $this->isEcStatus( 'EC VAT MOSS' );
	}

	/**
	 * @param string $sStatus - case insensitive status to compare
	 * @return bool
	 */
	public function isEcStatus( $sStatus ) {
		return ( strcasecmp( $this->ec_status, $sStatus ) === 0 );
	}

	/**
	 * One of:
	 *    Draft
	 * Scheduled To Email
	 * Open
	 * Zero Value
	 * Overdue
	 * Paid
	 * Overpaid
	 * Refunded
	 * Written-off
	 * Part written-off
	 * @param string $sStatus - case insensitive status to compare
	 * @return bool
	 */
	public function isStatus( $sStatus ) {
		return ( strcasecmp( $this->status, $sStatus ) === 0 );
	}

	/**
	 * @return bool
	 */
	public function isStatusDraft() {
		return $this->isStatus( 'Draft' );
	}

	/**
	 * @return bool
	 */
	public function isStatusOpen() {
		return $this->isStatus( 'Open' );
	}

	/**
	 * @return bool
	 */
	public function isStatusPaid() {
		return $this->isStatus( 'Paid' );
	}

	/**
	 * @return string YYYY-MM-DD
	 * @deprecated
	 */
	public function getDatedOn() {
		return $this->dated_on;
	}

	/**
	 * @return string YYYY-MM-DD
	 * @deprecated
	 */
	public function getPaidOn() {
		return $this->paid_on;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getEcStatus() {
		return $this->ec_status;
	}

	/**
	 * @return array[]
	 * @deprecated
	 */
	public function getLineItems() {
		return $this->invoice_items;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getPlaceOfSupply() {
		return $this->place_of_supply;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return float
	 * @deprecated
	 */
	public function getValueDue() {
		return $this->due_value;
	}

	/**
	 * @return float
	 * @deprecated
	 */
	public function getValuePaid() {
		return $this->paid_value;
	}

	/**
	 * @return float
	 * @deprecated
	 */
	public function getValueGross() {
		return $this->total_value;
	}

	/**
	 * @return float
	 * @deprecated
	 */
	public function getValueNet() {
		return $this->net_value;
	}

	/**
	 * @return float
	 * @deprecated
	 */
	public function getValueSalesTax() {
		return $this->sales_tax_value;
	}
}