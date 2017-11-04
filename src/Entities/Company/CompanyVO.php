<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Company;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/company
 *
 * Class CompanyVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Company
 */
class CompanyVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getCountry() {
		return $this->getStringParam( 'country' );
	}

	/**
	 * @return string
	 */
	public function getCurrency() {
		return $this->getStringParam( 'currency' );
	}

	/**
	 * @return string YYYY-MM-DD
	 */
	public function getDateCompanyStart() {
		return $this->getStringParam( 'company_start_date' );
	}

	/**
	 * @return string YYYY-MM-DD
	 */
	public function getDateFirstAccountingYearEnd() {
		return $this->getStringParam( 'first_accounting_year_end' );
	}

	/**
	 * @return string YYYY-MM-DD
	 */
	public function getDateFreeagentStart() {
		return $this->getStringParam( 'freeagent_start_date' );
	}

	/**
	 * @return string e.g. miles
	 */
	public function getMileageUnits() {
		return $this->getStringParam( 'mileage_units' );
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->getStringParam( 'name' );
	}

	/**
	 * @return string
	 */
	public function getRegistrationNumber() {
		return $this->getStringParam( 'company_registration_number' );
	}

	/**
	 * @return string
	 */
	public function getSalesTaxRegistrationStatus() {
		return $this->getStringParam( 'sales_tax_registration_status' );
	}

	/**
	 * @return string
	 */
	public function getSalesTaxRegistrationNumber() {
		return $this->getStringParam( 'sales_tax_registration_number' );
	}

	/**
	 * @return string
	 */
	public function getSubdomain() {
		return $this->getStringParam( 'subdomain' );
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->getStringParam( 'Type' );
	}

	/**
	 * @return bool
	 */
	public function isCisEnabled() {
		return $this->getParam( 'cis_enabled' );
	}
}