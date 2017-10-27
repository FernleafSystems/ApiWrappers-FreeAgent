<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/contacts
 *
 * Class ContactVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class ContactVO extends EntityVO {

	/**
	 * @return string 'Auto', 'Always', 'Never'
	 */
	public function getChargeSalesTax() {
		return $this->getStringParam( 'charge_sales_tax' );
	}

	/**
	 * @return string
	 */
	public function getCountry() {
		return $this->getStringParam( 'country' );
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->getStringParam( 'email' );
	}

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->getStringParam( 'first_name' );
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->getStringParam( 'last_name' );
	}

	/**
	 * @return string
	 */
	public function getOrganisationName() {
		return $this->getStringParam( 'organisation_name' );
	}

	/**
	 * @return string
	 */
	public function getSalesTaxRegistrationNumber() {
		return $this->getStringParam( 'sales_tax_registration_number' );
	}

	/**
	 * @return string 'Active', 'Hidden'
	 */
	public function getStatus() {
		return $this->getStringParam( 'status' );
	}

	/**
	 * @return bool
	 */
	public function hasSalesTaxRegistrationNumber() {
		return ( strlen( $this->getSalesTaxRegistrationNumber() ) > 0 );
	}
}