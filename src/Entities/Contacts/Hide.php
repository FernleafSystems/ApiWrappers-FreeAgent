<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Hide
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Hide extends Api {

	/**
	 * @param int $nContactId
	 * @return bool
	 */
	public function hide( $nContactId ) {
		return ( new Update() )->setFreeagentApi( $this->getFreeagentApi() )
							   ->update( $nContactId, [ 'status' => 'Hidden' ] );
	}

}