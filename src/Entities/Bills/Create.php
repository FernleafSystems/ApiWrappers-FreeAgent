<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Category\CategoryVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $aData
	 * @return BillVO|null
	 */
	public function create( $aData = array() ) {
		return $this->setRequestData( $aData, true )
					->sendRequestWithVoResponse();
	}

	/**
	 * @param CategoryVO $oCategory
	 * @return $this
	 */
	public function setCategory( $oCategory ) {
		return $this->setRequestDataItem( 'category', $oCategory->getUri() );
	}

	/**
	 * Will attempt to construct the URI for this category from the Base ID
	 * @param int $nId
	 * @return $this
	 */
	public function setCategoryId( $nId ) {
		return $this->setRequestDataItem( 'category', $this->getCategoryUrl( $nId ) );
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

	/**
	 * @param int $nId
	 * @return string
	 */
	protected function getCategoryUrl( $nId ) {
		return sprintf( '%scategories/%s', $this->getBaseUrl(), $nId );
	}

	/**
	 * @return array
	 */
	protected function getCriticalRequestItems() {
		return array( 'contact', 'dated_on', 'due_on', 'reference', 'total_value', 'category' );
	}
}