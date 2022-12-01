<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\Constants;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\Items\InvoiceItemVO;

class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @return InvoiceVO|null
	 */
	public function create( array $data = [] ) {
		return $this->setRequestData( $data )
					->sendRequestWithVoResponse();
	}

	public function addInvoiceItem( InvoiceItemVO $item ) :self {
		return $this->addInvoiceItemVOs( [ $item ] );
	}

	/**
	 * @param array[] $newItems
	 */
	public function addInvoiceItems( array $newItems ) :self {
		$items = $this->getRequestDataItem( 'invoice_items' );
		return $this->setRequestDataItem( 'invoice_items', array_merge(
			is_array( $items ) ? $items : [],
			$newItems
		) );
	}

	/**
	 * @param InvoiceItemVO[] $newItems
	 */
	public function addInvoiceItemVOs( array $newItems ) :self {
		return $this->addInvoiceItems( array_map( fn( $item ) => $item->getRawData(), $newItems ) );
	}

	/**
	 * @param string $comments
	 * @return $this
	 */
	public function setComments( $comments ) :self {
		return $this->setRequestDataItem( 'comments', $comments );
	}

	public function setContact( ContactVO $contact ) :self {
		return $this->setRequestDataItem( 'contact', $contact->getUri() );
	}

	/**
	 * @param string $currency e.g. GBP, USD, EUR
	 */
	public function setCurrency( string $currency ) :self {
		return $this->setRequestDataItem( 'currency', strtoupper( $currency ) );
	}

	public function setEcPlaceOfSupply( string $country ) :self {
		return $this->setRequestDataItem( 'place_of_supply', $country );
	}

	public function setEcStatus( string $status ) :self {
		return $this->setRequestDataItem( 'ec_status', $status );
	}

	public function setEcStatusNonEc() :self {
		return $this->setEcStatus( Constants::VAT_STATUS_UK_NON_EC );
	}

	public function setEcStatusVatMoss() :self {
		return $this->setEcStatus( Constants::VAT_STATUS_EC_MOSS );
	}

	public function setEcStatus_ReverseCharge() :self {
		return $this->setEcStatus( Constants::VAT_STATUS_REVERSE_CHARGE );
	}

	/**
	 * @param float $rate
	 */
	public function setExchangeRate( $rate ) :self {
		return $this->setRequestDataItem( 'exchange_rate', $rate );
	}

	/**
	 * @param int $days
	 */
	public function setPaymentTerms( $days ) :self {
		return $this->setRequestDataItem( 'payment_terms_in_days', (int)$days );
	}
}