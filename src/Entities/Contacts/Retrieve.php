<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

class Retrieve extends Base {

	public function exists() :bool {
		return $this->retrieve() !== null;
	}

	public function retrieve() :?ContactVO {
		return $this->sendRequestWithVoResponse();
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