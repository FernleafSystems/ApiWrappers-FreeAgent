<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\Constants;
use FernleafSystems\ApiWrappers\Freeagent\Utility\FreeagentCountryFromCountry;

class Create extends Base {

	public const REQUEST_METHOD = 'post';

	public function create( array $data = [] ) :?ContactVO {
		/** @var ContactVO $contact */
		return $this->setRequestData( $data )->sendRequestWithVoResponse();
	}

	public function createFromVO( ContactVO $contact ) :?ContactVO {
		return $this->create( $contact->getRawData() );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		$orgName = $this->getRequestDataItem( 'organisation_name' );
		if ( empty( $orgName ) ) {
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

	public function setAddress_Country( string $value ) :self {
		return $this->setRequestDataItem( 'country', ( new FreeagentCountryFromCountry() )->from( $value ) );
	}

	public function setAddress_Line( string $value, int $line = 1 ) :self {
		return $this->setRequestDataItem( 'address'.max( min( $line, 3 ), 1 ), $value );
	}

	public function setAddress_PostalCode( string $value ) :self {
		return $this->setRequestDataItem( 'postcode', $value );
	}

	public function setAddress_Region( string $value ) :self {
		return $this->setRequestDataItem( 'region', $value );
	}

	public function setAddress_Town( string $value ) :self {
		return $this->setRequestDataItem( 'town', $value );
	}

	public function setEmail( string $email ) :self {
		return $this->setRequestDataItem( 'email', $email )
					->setEmailForBilling( $email );
	}

	public function setEmailForBilling( string $email ) :self {
		return $this->setRequestDataItem( 'billing_email', $email );
	}

	public function setFirstName( string $name ) :self {
		return $this->setRequestDataItem( 'first_name', $name );
	}

	public function setLastName( string $name ) :self {
		return $this->setRequestDataItem( 'last_name', $name );
	}

	public function setOrganisationName( string $name ) :self {
		return $this->setRequestDataItem( 'organisation_name', $name );
	}

	public function setSalesTaxCharge( string $charge ) :self {
		if ( in_array( $charge, [
			ContactVO::CHARGE_SALES_TAX_ALWAYS,
			ContactVO::CHARGE_SALES_TAX_AUTO,
			ContactVO::CHARGE_SALES_TAX_NEVER
		] ) ) {
			$this->setRequestDataItem( 'charge_sales_tax', $charge );
		}
		return $this;
	}

	public function setSalesTaxNumber( string $taxRegistrationNumber ) :self {
		return $this->setRequestDataItem( 'sales_tax_registration_number', $taxRegistrationNumber );
	}

	public function setStatus( string $status ) :self {
		if ( in_array( $status, [ ContactVO::STATUS_HIDDEN, ContactVO::STATUS_ACTIVE ] ) ) {
			$this->setRequestDataItem( 'status', $status );
		}
		return $this;
	}

	public function setUseContactLevelInvoiceSequence( bool $contactLevel ) :self {
		return $this->setRequestDataItem( 'uses_contact_invoice_sequence', $contactLevel );
	}

	protected function getCriticalRequestItems() :array {
		return [ 'first_name', 'last_name' ];
	}
}