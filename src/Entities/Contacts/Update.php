<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

class Update extends Create {

	const REQUEST_METHOD = 'put';

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( !$this->hasEntityId() ) {
			throw new \Exception( 'Attempting to make "update" API request without an Entity ID' );
		}
	}

	/**
	 * @param array $aUpdateData
	 * @return ContactVO|null
	 */
	public function update( $aUpdateData = [] ) {
		return $this->create( $aUpdateData );
	}

	protected function getCriticalRequestItems() :array {
		return [];
	}
}