<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\EcMoss;

/**
 * https://dev.freeagent.com/docs/sales_tax#ec-vat-moss
 *
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\EcMoss
 */
class Retrieve extends Base {

	/**
	 * @param string $sCountry The place of supply
	 * @return $this
	 */
	public function setCountry( $sCountry ) {
		return $this->setRequestDataItem( 'country', ucfirst( strtolower( $sCountry ) ) );
	}

	/**
	 * @param string $sDate YYYY-MM-DD
	 * @return $this
	 */
	public function setDate( $sDate ) {
		return $this->setDateAttribute( 'date', $sDate );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'ec_moss/sales_tax_rates', $this->getEntityId() );
	}
}