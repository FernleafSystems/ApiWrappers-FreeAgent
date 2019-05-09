<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\Items\InvoiceItemVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $aData
	 * @return InvoiceVO|null
	 */
	public function create( $aData = [] ) {
		return $this->setRequestData( $aData, true )
					->sendRequestWithVoResponse();
	}

	/**
	 * @param InvoiceItemVO $oItem
	 * @return $this
	 */
	public function addInvoiceItem( $oItem ) {
		return $this->addInvoiceItemVOs( [ $oItem ] );
	}

	/**
	 * @param array[] $aNewItems
	 * @return $this
	 */
	public function addInvoiceItems( $aNewItems ) {
		$aItems = $this->getRequestDataItem( 'invoice_items' );
		if ( !is_array( $aItems ) ) {
			$aItems = [];
		}
		$aItems = array_merge(
			$aItems,
			$aNewItems
		);
		return $this->setRequestDataItem( 'invoice_items', $aItems );
	}

	/**
	 * @param InvoiceItemVO[] $aNewItems
	 * @return $this
	 */
	public function addInvoiceItemVOs( $aNewItems ) {
		return $this->addInvoiceItems(
			array_map(
				function ( $oNewItem ) {
					/** @var InvoiceItemVO $oNewItem */
					return $oNewItem->getRawDataAsArray();
				},
				$aNewItems
			)
		);
	}

	/**
	 * @param string $sComments
	 * @return $this
	 */
	public function setComments( $sComments ) {
		return $this->setRequestDataItem( 'comments', $sComments );
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
	 * @param string $sCountry
	 * @return $this
	 */
	public function setEcPlaceOfSupply( $sCountry ) {
		return $this->setRequestDataItem( 'place_of_supply', $sCountry );
	}

	/**
	 * @param string $sStatus 'EC VAT MOSS' : 'Non-EC'
	 * @return $this
	 */
	public function setEcStatus( $sStatus ) {
		return $this->setRequestDataItem( 'ec_status', $sStatus );
	}

	/**
	 * @return $this
	 */
	public function setEcStatusNonEc() {
		return $this->setEcStatus( 'Non-EC' );
	}

	/**
	 * @return $this
	 */
	public function setEcStatusVatMoss() {
		return $this->setEcStatus( 'EC VAT MOSS' );
	}

	/**
	 * @param float $nRate
	 * @return $this
	 */
	public function setExchangeRate( $nRate ) {
		return $this->setRequestDataItem( 'exchange_rate', $nRate );
	}

	/**
	 * @param int $nDays
	 * @return $this
	 */
	public function setPaymentTerms( $nDays ) {
		return $this->setRequestDataItem( 'payment_terms_in_days', (int)$nDays );
	}
}