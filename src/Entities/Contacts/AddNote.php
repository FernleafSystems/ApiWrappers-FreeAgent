<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class AddNote
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class AddNote extends Api {

	/**
	 * @param string       $nContactId
	 * @param array|string $aNoteLines
	 * @return bool
	 */
	public function add( $nContactId, $aNoteLines ) {
		$bSuccess = false;
		if ( !empty( $aNoteLines ) ) {

			if ( !is_array( $aNoteLines ) ) {
				$aNoteLines = [ $aNoteLines ];
			}

			array_unshift( $aNoteLines,
				sprintf( 'Date: %s', gmdate( 'Y-m-d H:i:s', WebApp::factory( 'Date' )->asTimestamp() ) )
			);

			$oResult = $this->getFreeagentApi()
							->createContactNote( $nContactId, implode( "\n", $aNoteLines ) );
			$bSuccess = $oResult->success;
		}
		return $bSuccess;
	}
}