<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\Items\BillItemVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Categories\CategoryVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

class Create extends Base {

	const REQUEST_METHOD = 'post';

	public function create( array $data = [] ) :?BillVO {
		return $this->setRequestData( $data )
					->sendRequestWithVoResponse();
	}

	public function addBillItem( BillItemVO $item, bool $merge = true ) :self {
		$items = $this->getRequestDataItem( 'bill_items' );
		if ( !$merge || !is_array( $items ) ) {
			$items = [];
		}
		$items[] = $item->getRawData();
		return $this->setRequestDataItem( 'bill_items', $items );
	}

	public function setCategory( CategoryVO $category ) :self {
		return $this->setRequestDataItem( 'category', $category->getUri() );
	}

	/**
	 * Will attempt to construct the URI for this category from the Base ID
	 * @param int $id
	 */
	public function setCategoryId( $id ) :self {
		return $this->setRequestDataItem( 'category', $this->getCategoryUrl( $id ) );
	}

	/**
	 * @param string $comment
	 */
	public function setComment( $comment ) :self {
		return $this->setRequestDataItem( 'comments', $comment );
	}

	/**
	 * @param ContactVO $contact
	 */
	public function setContact( $contact ) :self {
		return $this->setRequestDataItem( 'contact', $contact->getUri() );
	}

	/**
	 * @param string $currency e.g. GBP, USD, EUR
	 */
	public function setCurrency( string $currency ) :self {
		return $this->setRequestDataItem( 'currency', strtoupper( $currency ) );
	}

	/**
	 * @param int|string $mDate
	 * @return $this
	 */
	public function setDueOn( $mDate ) :self {
		return $this->setDateAttribute( 'due_on', $mDate );
	}

	public function setEcStatus( string $status ) :self {
		return $this->setRequestDataItem( 'ec_status', $status );
	}

	/**
	 * @param string $ref
	 */
	public function setReference( $ref ) :self {
		return $this->setRequestDataItem( 'reference', $ref );
	}

	/**
	 * @param int $rate
	 */
	public function setSalesTaxRate( $rate ) :self {
		return $this->setRequestDataItem( 'sales_tax_rate', (string)$rate );
	}

	/**
	 * @param float $total
	 * @return $this
	 */
	public function setTotalValue( $total ) :self {
		return $this->setRequestDataItem( 'total_value', (string)round( $total, 2 ) );
	}

	/**
	 * @param int $ID
	 */
	protected function getCategoryUrl( $ID ) :string {
		return sprintf( '%scategories/%s', $this->getBaseUrl(), str_pad( $ID, 3, '0', STR_PAD_LEFT ) );
	}

	protected function getCriticalRequestItems() :array {
		return [ 'contact', 'dated_on', 'due_on', 'reference' ];
	}
}