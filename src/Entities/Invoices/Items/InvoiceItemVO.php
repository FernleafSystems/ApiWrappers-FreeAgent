<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\Items;

use FernleafSystems\ApiWrappers\Freeagent\Entities;

/**
 * @property float  $sales_tax_rate
 * @property string $category        - url
 * @property string $description
 * @property int    $position        - starts at 1
 * @property float  $price
 * @property int    $quantity
 * @property string $item_type
 */
class InvoiceItemVO extends Entities\Common\EntityVO {

	/**
	 * @return float
	 */
	public function getValueSalesRate() {
		return $this->sales_tax_rate;
	}

	/**
	 * @param Entities\Categories\CategoryVO $oCategory
	 * @return $this
	 * @deprecated
	 */
	public function setCategory( $oCategory ) {
		$this->category = $oCategory->url;
		return $this;
	}

	/**
	 * TODO: remove hardcoded URL
	 * @param string $id
	 * @return $this
	 * @deprecated
	 */
	public function setCategoryId( $id ) {
		$this->category = 'https://api.freeagent.com/v2/categories/'.str_pad( $id, 3, '0', STR_PAD_LEFT );
		return $this;
	}

	/**
	 * @param string $description
	 * @return $this
	 * @deprecated
	 */
	public function setDescription( $description ) {
		$this->description = $description;
		return $this;
	}

	/**
	 * @param int $nPos Starts at 1
	 * @return $this
	 * @deprecated
	 */
	public function setPosition( $nPos ) {
		$this->position = $nPos;
		return $this;
	}

	/**
	 * Only required if item_type is not time-based
	 * @param float $nPrice
	 * @return $this
	 * @deprecated
	 */
	public function setPrice( $nPrice ) {
		$this->price = $nPrice;
		return $this;
	}

	/**
	 * Only required if item_type is not time-based
	 * @param float $nRate Starts at 1
	 * @return $this
	 * @deprecated
	 */
	public function setSalesTaxRate( $nRate ) {
		$this->sales_tax_rate = $nRate;
		return $this;
	}

	/**
	 * @param int $nQuantity the number of "item types"
	 * @return $this
	 * @deprecated
	 */
	public function setQuantity( $nQuantity ) {
		$this->quantity = $nQuantity;
		return $this;
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
		$this->item_type = ucfirst( strtolower( $sType ) );
		return $this;
	}
}