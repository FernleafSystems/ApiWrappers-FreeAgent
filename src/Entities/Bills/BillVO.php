<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\Items\BillItemVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/bills
 *
 * Class BillVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 * @property string       $contact            - URL
 * @property string       $project            - URL
 * @property bool         $recurring
 * @property string       $recurring_end_date - YYYY-MM-DD
 * @property string       $comments
 * @property string       $reference
 * @property string       $ec_status
 * @property string       $status
 * @property string       $dated_on           - YYYY-MM-DD
 * @property string       $due_on             - YYYY-MM-DD
 * @property float        $due_value
 * @property float        $paid_value
 * @property float        $total_value
 * @property float        $sales_tax_value
 * @property BillItemVO[] $bill_items
 */
class BillVO extends EntityVO {

	/**
	 * @param BillItemVO $item
	 * @return $this
	 */
	public function addBillItem( BillItemVO $item ) {
		$items = is_array( $this->bill_items ) ? $this->bill_items : [];
		$items[] = $item->getRawDataAsArray();
		$this->bill_items = $items;
		return $this;
	}

	/**
	 * @return BillItemVO[]
	 */
	public function getBillItems() {
		return array_map(
			function ( $raw ) {
				return ( new BillItemVO() )->applyFromArray( $raw );
			},
			is_array( $this->bill_items ) ? $this->bill_items : []
		);
	}

	/**
	 * @return float
	 * @deprecated
	 */
	public function getAmountDue() {
		return $this->due_value;
	}

	/**
	 * @return float
	 * @deprecated
	 */
	public function getAmountPaid() {
		return $this->paid_value;
	}

	/**
	 * @return float
	 * @deprecated
	 */
	public function getAmountTotal() {
		return $this->total_value;
	}

	/**
	 * @return string - date
	 * @deprecated
	 */
	public function getDueOn() {
		return $this->due_on;
	}

	/**
	 * @return string
	 */
	public function getContactId() {
		return $this->getIdFromEntityUrl( $this->contact );
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getDatedOn() {
		return $this->dated_on;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getEcStatus() {
		return $this->ec_status;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getReference() {
		return $this->reference;
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
	public function getValueSalesTax() {
		return $this->sales_tax_value;
	}
}