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
	 * @param string $sName
	 * @return $this
	 */
	public function setFirstName( $sName ) {
		return $this->setRequestDataItem( 'first_name', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setLastName( $sName ) {
		return $this->setRequestDataItem( 'last_name', $sName );
	}

	/**
	 * @return array
	 */
	protected function getCriticalRequestItems() {
		return array( 'first_name', 'last_name' );
	}
}