<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Create extends Retrieve {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $aAdditionalData
	 * @return BillVO|null
	 */
	public function create( $aAdditionalData = array() ) {
		return $this->setRequestData( $aAdditionalData, true )
					->asVoResponse();
	}

	/**
	 * @param int $nId
	 * @return $this
	 */
	public function setCategoryId( $nId ) {
		return $this->setRequestDataItem( 'category', '[categories]:' . $nId );
	}

	/**
	 * @param string $sComment
	 * @return $this
	 */
	public function setComment( $sComment ) {
		return $this->setRequestDataItem( 'comments', $sComment );
	}

	/**
	 * @param ContactVO $oContact
	 * @return $this
	 */
	public function setContact( $oContact ) {
		return $this->setRequestDataItem( 'contact', $oContact->getUri() );
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
		return $this->setRequestDataItem( 'ec_status', $sStatus );
	}

	/**
	 * @param string $sRef
	 * @return $this
	 */
	public function setReference( $sRef ) {
		return $this->setRequestDataItem( 'reference', $sRef );
	}

	/**
	 * @param int $nRate
	 * @return $this
	 */
	public function setSalesTaxRate( $nRate ) {
		return $this->setRequestDataItem( 'sales_tax_rate', (string)$nRate );
	}

	/**
	 * @param float $nTotal
	 * @return $this
	 */
	public function setTotalValue( $nTotal ) {
		return $this->setRequestDataItem( 'total_value', (string)round( $nTotal, 2 ) );
	}
}