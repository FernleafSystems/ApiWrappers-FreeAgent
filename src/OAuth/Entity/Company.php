<?php

namespace FernleafSystems\ApiWrappers\Freeagent\OAuth\Provider;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class Company
 * @property string url
 * @property string name
 * @property string subdomain
 * @property string type
 * @property string currency
 * @property string mileage_units
 * @property string company_start_date
 * @property string freeagent_start_date
 * @property string first_accounting_year_end
 * @property string company_registration_number
 * @property string sales_tax_registration_status
 * @property string sales_tax_name
 * @property string sales_tax_registration_number
 * @property string sales_tax_rates
 * @property string sales_tax_is_value_added
 * @property string supports_auto_sales_tax_on_purchases
 */
class Company {

	use StdClassAdapter;

	/**
	 * @param array $aAttributes
	 */
	public function __construct( array $aAttributes ) {
		$this->applyFromArray( $aAttributes );
	}

	/**
	 * @return array
	 */
	public function toArray() {
		return [
			'name'                        => $this->name,
			'type'                        => $this->type,
			'company_registration_number' => $this->company_registration_number
		];
	}

	/**
	 * @return string
	 */
	public function toString() {
		return $this->name;
	}
}
