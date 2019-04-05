<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

/**
 * Class Finder
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Finder extends ContactsIterator {

	/**
	 * @param string $sEmail
	 * @return ContactVO|null
	 */
	public function findByEmail( $sEmail ) {
		$oTheOne = null;
		foreach ( $this as $oContact ) {
			if ( strcasecmp( $oContact->email, $sEmail ) === 0 ) {
				$oTheOne = $oContact;
				break;
			}
		}
		return $oTheOne;
	}
}