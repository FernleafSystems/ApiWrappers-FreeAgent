<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Categories;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Categories
 */
class Retrieve extends Base {

	/**
	 * @return bool
	 */
	public function exists() {
		return !is_null( $this->retrieve() );
	}

	/**
	 * @return CategoryVO
	 */
	public function retrieve() {
		return $this->sendRequestWithVoResponse();
	}

	/**
	 * @param int $nId
	 * @return $this
	 */
	public function setEntityId( $nId ) {
		return $this->setParam( 'entity_id', str_pad( $nId, 3, '0', STR_PAD_LEFT ) );
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