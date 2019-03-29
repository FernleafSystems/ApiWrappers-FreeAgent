<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/contacts
 *
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
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
	 */
	public function getChargeSalesTax() {
		return $this->charge_sales_tax;
	}

	/**
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->first_name;
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * @return string
	 */
	public function getOrganisationName() {
		return $this->organisation_name;
	}

	/**
	 * @return string
	 */
	public function getSalesTaxRegistrationNumber() {
		return $this->sales_tax_registration_number;
	}

	/**
	 * @return string 'Active', 'Hidden'
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return bool
	 */
	public function hasSalesTaxRegistrationNumber() {
		return !empty( $this->sales_tax_registration_number );
	}
}