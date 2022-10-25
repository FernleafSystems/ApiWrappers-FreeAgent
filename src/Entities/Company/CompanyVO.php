<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Company;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/company
 * @property string $name
 * @property string $currency
 * @property string $company_start_date        - YYYY-MM-DD
 * @property string $first_accounting_year_end - YYYY-MM-DD
 * @property string $freeagent_start_date      - YYYY-MM-DD
 * @property string $mileage_units
 * @property string $company_registration_number
 * @property string $sales_tax_registration_status
 * @property string $sales_tax_registration_number
 * @property string $subdomain
 * @property string $type
 *            - UkLimitedCompany, UkSoleTrader, UkPartnership,
 *           UkLimitedLiabilityPartnership, UsSoleProprietor, UsPartnership, UsLimitedLiabilityCompany, UsSCorp UsCCorp
 *           UniversalCompany
 * @property bool   $cis_enabled
 * @property string $short_date_format         - dd mmm yy, dd-mm-yyyy, mm/dd/yyyy, yyyy-mm-dd
 * @property string $website
 * @property string $contact_email
 * @property string $contact_phone
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $town
 * @property string $region
 * @property string $postcode
 * @property string $country
 */
class CompanyVO extends EntityVO {

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
	public function getCurrency() {
		return $this->currency;
	}

	/**
	 * @return string YYYY-MM-DD
	 * @deprecated
	 */
	public function getDateCompanyStart() {
		return $this->company_start_date;
	}

	/**
	 * @return string YYYY-MM-DD
	 * @deprecated
	 */
	public function getDateFirstAccountingYearEnd() {
		return $this->first_accounting_year_end;
	}

	/**
	 * @return string YYYY-MM-DD
	 * @deprecated
	 */
	public function getDateFreeagentStart() {
		return $this->freeagent_start_date;
	}

	/**
	 * @return string e.g. miles
	 * @deprecated
	 */
	public function getMileageUnits() {
		return $this->mileage_units;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getRegistrationNumber() {
		return $this->company_registration_number;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getSalesTaxRegistrationStatus() {
		return $this->sales_tax_registration_status;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getSalesTaxRegistrationNumber() {
		return $this->sales_tax_registration_number;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getSubdomain() {
		return $this->subdomain;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return bool
	 * @deprecated
	 */
	public function isCisEnabled() {
		return $this->cis_enabled;
	}
}