<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $aData
	 * @return ContactVO|null
	 */
	public function create( $aData = [] ) {
		/** @var ContactVO $oContact */
		$oContact = $this->setRequestData( $aData, true )
						 ->sendRequestWithVoResponse();

		{ // Fix for FreeAgent API broken country names.
			$aMap = $this->getBrokenCountriesMap();
			$sRequestedCo = $this->getRequestDataItem( 'country' );
			if ( $oContact instanceof EntityVO && in_array( $sRequestedCo, $aMap )
				 && !in_array( $oContact->getCountry(), [ $sRequestedCo, $aMap[ $sRequestedCo ] ] ) ) {
				$oContact = $this->setAddress_Country( $aMap[ $sRequestedCo ] )
								 ->sendRequestWithVoResponse();
			}
		}

		return $oContact;
	}

	/**
	 * @return array
	 */
	private function getBrokenCountriesMap() {
		$aCountryMap = [
			'Czechia'         => 'Czech Republic',
			'Slovak Republic' => 'Slovakia',
		];
		return array_merge(
			$aCountryMap,
			array_flip( $aCountryMap )
		);
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		$sOrganisationName = $this->getRequestDataItem( 'organisation_name' );
		if ( empty( $sOrganisationName ) ) {
			$sFirstName = $this->getRequestDataItem( 'first_name' );
			if ( empty( $sFirstName ) ) {
				throw new \Exception( sprintf( 'Field "%s" cannot be empty.', 'first_name' ) );
			}
			$sLastName = $this->getRequestDataItem( 'last_name' );
			if ( empty( $sLastName ) ) {
				throw new \Exception( sprintf( 'Field "%s" cannot be empty.', 'last_name' ) );
			}
		}
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setAddress_Country( $sValue ) {
		return $this->setRequestDataItem( 'country', $sValue );
	}

	/**
	 * @param string $sValue
	 * @param int    $nLine
	 * @return $this
	 */
	public function setAddress_Line( $sValue, $nLine = 1 ) {
		return $this->setRequestDataItem( 'address'.$nLine, $sValue );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setAddress_PostalCode( $sValue ) {
		return $this->setRequestDataItem( 'postcode', $sValue );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setAddress_Region( $sValue ) {
		return $this->setRequestDataItem( 'region', $sValue );
	}

	/**
	 * @param string $sValue
	 * @return $this
	 */
	public function setAddress_Town( $sValue ) {
		return $this->setRequestDataItem( 'town', $sValue );
	}

	/**
	 * @param string $sEmail - will set both account email and billing email
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail )
					->setEmailForBilling( $sEmail );
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmailForBilling( $sEmail ) {
		return $this->setRequestDataItem( 'billing_email', $sEmail );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setFirstName( $sName ) {
		return $this->setRequestDataItem( 'first_name', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setLastName( $sName ) {
		return $this->setRequestDataItem( 'last_name', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setOrganisationName( $sName ) {
		return $this->setRequestDataItem( 'organisation_name', $sName );
	}

	/**
	 * @param string $sAutoAlwaysNever
	 * @return $this
	 */
	public function setSalesTaxCharge( $sAutoAlwaysNever ) {
		return $this->setRequestDataItem( 'charge_sales_tax', $sAutoAlwaysNever );
	}

	/**
	 * @param string $sRegistrationNumber
	 * @return $this
	 */
	public function setSalesTaxNumber( $sRegistrationNumber ) {
		return $this->setRequestDataItem( 'sales_tax_registration_number', $sRegistrationNumber );
	}

	/**
	 * @param string $sStatus
	 * @return $this
	 */
	public function setStatus( $sStatus ) {
		return $this->setRequestDataItem( 'status', ucfirst( strtolower( $sStatus ) ) );
	}

	/**
	 * @param bool $bContactLevel
	 * @return $this
	 */
	public function setUseContactLevelInvoiceSequence( $bContactLevel ) {
		return $this->setRequestDataItem( 'uses_contact_invoice_sequence', $bContactLevel );
	}

	/**
	 * @return array
	 */
	protected function getCriticalRequestItems() {
		return [ 'first_name', 'last_name' ];
	}
}