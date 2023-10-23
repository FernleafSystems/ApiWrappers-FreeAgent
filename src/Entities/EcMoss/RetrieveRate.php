<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\EcMoss;

use FernleafSystems\ApiWrappers\Freeagent\Utility\FreeagentCountryFromCountry;

/**
 * https://dev.freeagent.com/docs/sales_tax#ec-vat-moss
 */
class RetrieveRate extends Base {

	/**
	 * @param string $country The place of supply
	 * @return $this
	 */
	public function setCountry( $country ) {
		return $this->setRequestDataItem( 'country', ( new FreeagentCountryFromCountry() )->from( (string)$country ) );
	}

	/**
	 * @param string $sDate YYYY-MM-DD
	 * @return $this
	 */
	public function setDate( $sDate ) {
		return $this->setDateAttribute( 'date', $sDate );
	}

	protected function getUrlEndpoint():string {
		return sprintf( 'ec_moss/sales_tax_rates', $this->entity_id );
	}
}