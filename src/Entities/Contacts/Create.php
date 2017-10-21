<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Create extends Api {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $aData
	 * @return ContactVO|null
	 */
	public function create( $aData = array() ) {
		return $this->setRequestData( $aData, true )
					->sendRequestWithVoResponse();
	}
}