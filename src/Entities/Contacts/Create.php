<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\Constants;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $aData
	 * @return ContactVO|null
	 */
	public function create( $aData = [] ) {
		/** @var ContactVO $contact */
		$contact = $this->setRequestData( $aData, true )
						->sendRequestWithVoResponse();

		{ // Fix for FreeAgent API broken country names. Find which FA Country corresponds to the requested country.
			$requestedCountry = $this->getRequestDataItem( 'country' );
			if ( $contact instanceof EntityVO && $contact->country !== $requestedCountry ) {
				foreach ( Constants::FREEAGENT_EU_COUNTRIES as $faCountry => $alternatives ) {
					if ( in_array( strtolower( $requestedCountry ), array_map( 'strtolower', $alternatives ) ) ) {
						$contact = $this->setAddress_Country( $faCountry )
										->sendRequestWithVoResponse();
						break;
					}
				}
			}
		}

		return $contact;
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		$sOrganisationName = $this->getRequestDataItem( 'organisation_name' );
		if ( empty( $sOrganisationName ) ) {
			$firstName = $this->getRequestDataItem( 'first_name' );
			if ( empty( $firstName ) ) {
				throw new \Exception( sprintf( 'Field "%s" cannot be empty.', 'first_name' ) );
			}
			$lastname = $this->getRequestDataItem( 'last_name' );
			if ( empty( $lastname ) ) {
				throw new \Exception( sprintf( 'Field "%s" cannot be empty.', 'last_name' ) );
			}
		}
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setAddress_Country( $value ) {
		return $this->setRequestDataItem( 'country', $value );
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
	 * @param string $email - will set both account email and billing email
	 * @return $this
	 */
	public function setEmail( $email ) {
		return $this->setRequestDataItem( 'email', $email )
					->setEmailForBilling( $email );
	}

	/**
	 * @param string $email
	 * @return $this
	 */
	public function setEmailForBilling( $email ) {
		return $this->setRequestDataItem( 'billing_email', $email );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setFirstName( $sName ) {
		return $this->setRequestDataItem( 'first_name', $sName );
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setLastName( $name ) {
		return $this->setRequestDataItem( 'last_name', $name );
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setOrganisationName( $name ) {
		return $this->setRequestDataItem( 'organisation_name', $name );
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

	protected function getCriticalRequestItems() :array {
		return [ 'first_name', 'last_name' ];
	}
}