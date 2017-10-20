<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Retrieve extends Api {

	/**
	 * @param int $nId
	 * @return ContactVO|null
	 */
	public function asVo( $nId ) {
		$aData = $this->retrieve( $nId );
		return !empty( $aData ) ? ( new ContactVO() )->applyFromArray( $aData ) : null;
	}

	/**
	 * @param int $nId
	 * @return array
	 */
	public function retrieve( $nId ) {
		return $this->getFreeagentApi()
					->getContact( $nId )->array;
	}
}