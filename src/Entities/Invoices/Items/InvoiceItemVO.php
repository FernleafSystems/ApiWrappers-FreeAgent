<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\Items;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Categories\CategoryVO;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class InvoiceItemVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\Items
 */
class InvoiceItemVO extends EntityVO {

	/**
	 * @return float
	 */
	public function getValueSalesRate() {
		return $this->getParam( 'sales_tax_rate' );
	}

	/**
	 * @param CategoryVO $oCategory
	 * @return $this
	 */
	public function setCategory( $oCategory ) {
		return $this->setParam( 'category', $oCategory->getUri() );
	}

	/**
	 * TODO: remove hardcoded URL
	 * @param string $nId
	 * @return $this
	 */
	public function setCategoryId( $nId ) {
		$nId = str_pad( $nId, 3, '0', STR_PAD_LEFT );
		return $this->setParam( 'category', 'https://api.freeagent.com/v2/categories/'.$nId );
	}

	/**
	 * @param string $sDescription
	 * @return $this
	 */
	public function setDescription( $sDescription ) {
		return $this->setParam( 'description', $sDescription );
	}

	/**
	 * @param int $nPos Starts at 1
	 * @return $this
	 */
	public function setPosition( $nPos ) {
		return $this->setParam( 'position', $nPos );
	}

	/**
	 * Only required if item_type is not time-based
	 * @param float $nPrice Starts at 1
	 * @return $this
	 */
	public function setPrice( $nPrice ) {
		return $this->setParam( 'price', $nPrice );
	}

	/**
	 * Only required if item_type is not time-based
	 * @param float $nRate Starts at 1
	 * @return $this
	 */
	public function setSalesTaxRate( $nRate ) {
		return $this->setParam( 'sales_tax_rate', $nRate );
	}

	/**
	 * @param int $nQuantity the number of "item types"
	 * @return $this
	 */
	public function setQuantity( $nQuantity ) {
		return $this->setParam( 'quantity', $nQuantity );
	}

	/**
	 * Hours
	 * Days
	 * Weeks
	 * Months
	 * Years
	 * Products
	 * Services
	 * Training
	 * Expenses
	 * Comment
	 * Bills
	 * Discount
	 * Credit
	 * VAT
	 * Stock
	 * @param string $sType
	 * @return $this
	 */
	public function setType( $sType ) {
		return $this->setParam( 'item_type', ucfirst( strtolower( $sType ) ) );
	}
}