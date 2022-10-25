<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

class RetrieveMe extends Retrieve {

	/**
	 * @return UserVO
	 */
	public function retrieve() {
		$this->setEntityId( 'me' );
		return parent::retrieve();
	}
}