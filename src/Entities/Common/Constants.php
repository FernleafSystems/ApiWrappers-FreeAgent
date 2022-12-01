<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

final class Constants {

	public const VAT_STATUS_UK_NON_EC = 'UK/Non-EC';
	public const VAT_STATUS_UK_NON_EC_CODE = 0;
	public const VAT_STATUS_EC_SERVICES = 'EC Services';
	public const VAT_STATUS_EC_SERVICES_CODE = 1;
	public const VAT_STATUS_EC_GOODS = 'EC Goods';
	public const VAT_STATUS_EC_GOODS_CODE = 2;
	public const VAT_STATUS_EC_MOSS = 'EC VAT MOSS';
	public const VAT_STATUS_EC_MOSS_CODE = 3;
	public const VAT_STATUS_REVERSE_CHARGE = 'REVERSE CHARGE';
	public const VAT_STATUS_REVERSE_CHARGE_CODE = 4;
	/**
	 * Left: Freeagent
	 * Right: Alternatives
	 */
	public const FREEAGENT_EU_COUNTRIES = [
		'Austria'        => [],
		'Belgium'        => [],
		'Bulgaria'       => [],
		'Croatia'        => [],
		'Cyprus'         => [],
		'Czech Republic' => [
			'Czechia'
		],
		'Denmark'        => [],
		'Estonia'        => [],
		'Finland'        => [],
		'France'         => [],
		'Germany'        => [],
		'Greece'         => [],
		'Hungary'        => [],
		'Ireland'        => [],
		'Italy'          => [],
		'Latvia'         => [],
		'Lithuania'      => [],
		'Luxembourg'     => [],
		'Malta'          => [],
		'Netherlands'    => [],
		'Poland'         => [],
		'Portugal'       => [],
		'Romania'        => [],
		'Slovakia'       => [
			'Slovak Republic',
		],
		'Slovenia'       => [],
		'Spain'          => [],
		'Sweden'         => [],
	];
}