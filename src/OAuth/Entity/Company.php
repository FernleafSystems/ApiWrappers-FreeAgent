<?php

namespace FernleafSystems\ApiWrappers\Freeagent\OAuth\Entity;

use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
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

	use DynProperties;

	/**
	 * @param array $attributes
	 */
	public function __construct( array $attributes ) {
		$this->applyFromArray( $attributes );
	}

	public function toArray() :array {
		return [
			'name'                        => $this->name,
			'type'                        => $this->type,
			'company_registration_number' => $this->company_registration_number
		];
	}

	public function toString() :string {
		return $this->name;
	}
}
