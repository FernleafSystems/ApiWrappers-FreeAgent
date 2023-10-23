<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Utility;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\Constants;

class FreeagentCountryFromCountry {

	public function from( string $country ) {
		$country = \trim( \ucwords( \strtolower( $country ) ) );

		// It's not a standard EU country.
		if ( !isset( Constants::FREEAGENT_EU_COUNTRIES[ $country ] ) ) {
			foreach ( Constants::FREEAGENT_EU_COUNTRIES as $faCountry => $altCountries ) {
				if ( \in_array( $country, $altCountries ) ) {
					$country = $faCountry;
					break;
				}
			}
		}

		// TODO: ISO 2 & 3

		return $country;
	}
}