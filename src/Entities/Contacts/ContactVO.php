<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/contacts
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $organisation_name
 * @property string $country
 * @property string $sales_tax_registration_number
 * @property string $charge_sales_tax - 'Auto', 'Always', 'Never'
 * @property string $status
 */
class ContactVO extends EntityVO {

	/**
	 * @return string
	 * @deprecated
	 */
	public function getChargeSalesTax() {
		return $this->charge_sales_tax;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getFirstName() {
		return $this->first_name;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getOrganisationName() {
		return $this->organisation_name;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getSalesTaxRegistrationNumber() {
		return $this->sales_tax_registration_number;
	}

	/**
	 * @return string 'Active', 'Hidden'
	 * @deprecated
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return bool
	 * @deprecated
	 */
	public function hasSalesTaxRegistrationNumber() {
		return !empty( $this->sales_tax_registration_number );
	}
}