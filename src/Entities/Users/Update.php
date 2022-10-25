<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

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
	 * @return UserVO|null
	 */
	public function update( $aUpdateData = [] ) {
		return $this->create( $aUpdateData );
	}
}