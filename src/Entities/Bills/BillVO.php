<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/bills
 *
 * Class BillVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 * @property string $reference
 * @property string $ec_status
 * @property string $status
 * @property string $dated_on - YYYY-MM-DD
 * @property string $due_on   - YYYY-MM-DD
 * @property float  $due_value
 * @property float  $paid_value
 * @property float  $total_value
 * @property float  $sales_tax_value
 */
class BillVO extends EntityVO {

	/**
	 * @return float
	 */
	public function getAmountDue() {
		return $this->due_value;
	}

	/**
	 * @return float
	 */
	public function getAmountPaid() {
		return $this->paid_value;
	}

	/**
	 * @return float
	 */
	public function getAmountTotal() {
		return $this->total_value;
	}

	/**
	 * @return string
	 */
	public function getCategoryUri() {
		return $this->getStringParam( 'category' );
	}

	/**
	 * @return string - date
	 */
	public function getDueOn() {
		return $this->due_on;
	}

	/**
	 * @return string
	 */
	public function getContactId() {
		return basename( $this->getStringParam( 'contact' ) );
	}

	/**
	 * @return string
	 */
	public function getDatedOn() {
		return $this->dated_on;
	}

	/**
	 * @return string
	 */
	public function getEcStatus() {
		return $this->ec_status;
	}

	/**
	 * @return string
	 */
	public function getReference() {
		return $this->reference;
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return float
	 */
	public function getValueSalesTax() {
		return $this->sales_tax_value;
	}
}