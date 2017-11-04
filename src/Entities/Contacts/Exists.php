<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

/**
 * Class Exists
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Exists extends Retrieve {

	/**
	 * @param int $nId
	 * @return bool
	 */
	public function byId( $nId ) {
		$oContact = $this->setEntityId( $nId )
						 ->sendRequestWithVoResponse();
		return !is_null( $oContact );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( !$this->hasEntityId() ) {
			throw new \Exception( 'Attempting to make "retrieve" API request without an Entity ID' );
		}
	}
}