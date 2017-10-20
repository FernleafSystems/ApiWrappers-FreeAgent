<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

/**
 * Class FindBase
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 */
class FindBase extends RequestBase {

	/**
	 * @param int $nDate
	 * @param int $nRadius
	 * @return $this
	 */
	public function setDateRange( $nDate, $nRadius = 5 ) {

		$nDaysRadius = 86400 * $nRadius;

		$aParams = $this->getParams();
		$aParams[ 'from_date' ] = gmdate( 'Y-m-d', $nDate - $nDaysRadius );
		$aParams[ 'to_date' ] = gmdate( 'Y-m-d', $nDate + $nDaysRadius );

		return $this->setParams( $aParams );
	}
}