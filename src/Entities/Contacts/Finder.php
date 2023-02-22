<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

class Finder extends ContactsIterator {

	/**
	 * @param string $email
	 * @return ContactVO|null
	 */
	public function findByEmail( $email ) {
		$theOne = null;
		foreach ( $this as $contact ) {
			if ( strcasecmp( $contact->email, $email ) === 0 ) {
				$theOne = $contact;
				break;
			}
		}
		return $theOne;
	}
}