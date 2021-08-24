<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\Items\BillItemVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Categories\CategoryVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $data
	 * @return BillVO|null
	 */
	public function create( array $data = [] ) {
		return $this->setRequestData( $data, true )
					->sendRequestWithVoResponse();
	}

	/**
	 * @param BillItemVO $item
	 * @return $this
	 */
	public function addBillItem( BillItemVO $item, $merge = true ) {
		$items = $this->getRequestDataItem( 'bill_items' );
		if ( !$merge || !is_array( $items ) ) {
			$items = [];
		}
		$items[] = $item->getRawDataAsArray();
		return $this->setRequestDataItem( 'bill_items', $items );
	}

	/**
	 * @param CategoryVO $category
	 * @return $this
	 */
	public function setCategory( CategoryVO $category ) {
		return $this->setRequestDataItem( 'category', $category->getUri() );
	}

	/**
	 * Will attempt to construct the URI for this category from the Base ID
	 * @param int $id
	 * @return $this
	 */
	public function setCategoryId( $id ) {
		return $this->setRequestDataItem( 'category', $this->getCategoryUrl( $id ) );
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
	 * @param string $sCurrency e.g. GBP, USD, EUR
	 * @return $this
	 */
	public function setCurrency( $sCurrency ) {
		return $this->setRequestDataItem( 'currency', strtoupper( $sCurrency ) );
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
		return sprintf( '%scategories/%s', $this->getBaseUrl(), str_pad( $nId, 3, '0', STR_PAD_LEFT ) );
	}

	/**
	 * @return array
	 */
	protected function getCriticalRequestItems() {
		return [ 'contact', 'dated_on', 'due_on', 'reference', 'total_value', 'category' ];
	}
}