<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/contacts
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $organisation_name
 * @property string $charge_sales_tax - 'Auto', 'Always', 'Never'
 * @property string $sales_tax_registration_number
 * @property string $status
 * @property string $billing_email
 * @property string $phone_number
 * @property string $mobile
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $town
 * @property string $region
 * @property string $postcode
 * @property string $country
 * @property bool   $uses_contact_invoice_sequence
 */
class ContactVO extends EntityVO {

	public const CHARGE_SALES_TAX_AUTO = 'Auto';
	public const CHARGE_SALES_TAX_ALWAYS = 'Always';
	public const CHARGE_SALES_TAX_NEVER = 'Never';
	public const STATUS_ACTIVE = 'Active';
	public const STATUS_HIDDEN = 'Hidden';
}