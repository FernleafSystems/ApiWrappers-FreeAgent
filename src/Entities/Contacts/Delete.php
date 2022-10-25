<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

class Delete extends Base {

	const REQUEST_METHOD = 'delete';

	/**
	 * @param int $nContactId
	 * @return $this
	 */
	public function delete( $nContactId = 0 ) {
		if ( is_int( $nContactId ) && $nContactId > 0 ) {
			$this->setEntityId( $nContactId );
		}
		return $this->send();
	}
}