<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $aData
	 * @return ContactVO|null
	 */
	public function create( $aData = array() ) {
		return $this->setRequestData( $aData, true )
					->sendRequestWithVoResponse();
	}

	/**
	 * @return array
	 */
	protected function getCriticalRequestItems() {
		return array( 'first_name', 'last_name' );
	}
}