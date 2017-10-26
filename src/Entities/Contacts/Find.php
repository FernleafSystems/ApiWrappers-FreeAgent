<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Find extends RetrieveBulk {

	/**
	 * @param string $sEmailAddressToFind
	 * @return ContactVO|null
	 */
	public function byEmailAddress( $sEmailAddressToFind ) {
		/** @var ContactVO[] $oContact */
		$aContacts = $this
			->setResultsLimit( 1 )
			->setParam( 'email_address_to_find', $sEmailAddressToFind )
			->run();
		return count( $aContacts ) ? $aContacts[ 0 ] : null;
	}

	/**
	 * @param array[] $aResultSet
	 * @return array[]
	 */
	protected function filterItemsFromResults( $aResultSet ) {
		$aFiltered = array();

		$sEmail = $this->getParam( 'email_address_to_find' );
		foreach ( $aResultSet as $aContact ) {
			if ( isset( $aContact[ 'email' ] ) && ( $aContact[ 'email' ] == $sEmail ) ) {
				$aFiltered[] = $aContact;
			}
		}
		return $aFiltered;
	}
}