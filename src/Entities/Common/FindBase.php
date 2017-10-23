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
		$nDaysRadius = 86400*$nRadius;
		return $this->setRequestDataItem( 'from_date', gmdate( 'Y-m-d', $nDate - $nDaysRadius ) )
					->setRequestDataItem( 'to_date', gmdate( 'Y-m-d', $nDate + $nDaysRadius ) );
	}
}