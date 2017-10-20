<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/bills
 *
 * Class BillVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class BillVO extends EntityVO {

	/**
	 * @return float
	 */
	public function getAmountDue() {
		return $this->getNumericParam( 'due_value' );
	}

	/**
	 * @return float
	 */
	public function getAmountPaid() {
		return $this->getNumericParam( 'paid_value' );
	}

	/**
	 * @return float
	 */
	public function getAmountTotal() {
		return $this->getParam( 'total_value' );
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
		return $this->getStringParam( 'dated_on' );
	}

	/**
	 * @return string
	 */
	public function getEcStatus() {
		return $this->getStringParam( 'ec_status' );
	}

	/**
	 * @return string
	 */
	public function getReference() {
		return $this->getStringParam( 'reference' );
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->getStringParam( 'status' );
	}

	/**
	 * @return float
	 */
	public function getValueSalesTax() {
		return $this->getParam( 'sales_tax_value' );
	}
}