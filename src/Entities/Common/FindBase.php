<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class FindBase
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 */
class FindBase extends Api {

	/**
	 * @param int $nDate
	 * @param int $nRadius
	 * @return $this
	 */
	public function setDateRange( $nDate, $nRadius = 5 ) {
		$nDaysRad = 86400*$nRadius;
		return $this->setRequestDataItem( 'from_date', $this->convertToStdDateFormat( $nDate - $nDaysRad ) )
					->setRequestDataItem( 'to_date', $this->convertToStdDateFormat( $nDate + $nDaysRad ) );
	}
}