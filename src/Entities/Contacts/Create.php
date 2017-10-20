<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Create extends Api {

	/**
	 * @param array $aNewData
	 * @return ContactVO|null
	 */
	public function create( $aNewData ) {
		$oResult = $this->getFreeagentApi()
						->createContact( $aNewData );

		$oNew = null;
		if ( !empty( $oResult->array ) ) {
			$oNew = ( new ContactVO() )->applyFromArray( $oResult->array );
		}
		return $oNew;
	}
}