<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RequestBase;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Create extends RequestBase {

	/**
	 * @param array $aAdditionalData
	 * @return BillVO|null
	 */
	public function create( $aAdditionalData = array() ) {
		$oResult = $this->getFreeagentApi()
						->createBill( array_merge( $this->getParams(), $aAdditionalData ) );

		$oNew = null;
		if ( !empty( $oResult->array ) ) {
			$oNew = ( new BillVO() )->applyFromArray( $oResult->array );
		}
		return $oNew;
	}

	/**
	 * @param int $nId
	 * @return $this
	 */
	public function setCategoryId( $nId ) {
		return $this->setParam( 'category', '[categories]:' . $nId );
	}

	/**
	 * @param string $sComment
	 * @return $this
	 */
	public function setComment( $sComment ) {
		return $this->setParam( 'comments', $sComment );
	}

	/**
	 * @param ContactVO $oContact
	 * @return $this
	 */
	public function setContact( $oContact ) {
		return $this->setParam( 'contact', $oContact->getUri() );
	}

	/**
	 * @param int|string $mDate
	 * @return $this
	 */
	public function setDueOn( $mDate ) {
		return $this->setDateAttribute( 'due_on', $mDate );
	}

	/**
	 * @param string string
	 * @return $this
	 */
	public function setEcStatus( $sStatus ) {
		return $this->setParam( 'ec_status', $sStatus );
	}

	/**
	 * @param string $sRef
	 * @return $this
	 */
	public function setReference( $sRef ) {
		return $this->setParam( 'reference', $sRef );
	}

	/**
	 * @param int $nRate
	 * @return $this
	 */
	public function setSalesTaxRate( $nRate ) {
		return $this->setParam( 'sales_tax_rate', (string)$nRate );
	}

	/**
	 * @param float $nTotal
	 * @return $this
	 */
	public function setTotalValue( $nTotal ) {
		return $this->setParam( 'total_value', (string)round( $nTotal, 2 ) );
	}
}