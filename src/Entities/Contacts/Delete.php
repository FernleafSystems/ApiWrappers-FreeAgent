<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

class Delete extends Base {

	public const REQUEST_METHOD = 'delete';

	public function delete( $contactId = 0 ) :self {
		if ( is_int( $contactId ) && $contactId > 0 ) {
			$this->setEntityId( $contactId );
		}
		return $this->send();
	}
}