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
		/** @var ContactVO|null $oContact */
		$oContact = $this
			->setIsCustomFiltered( true )
			->setParam( 'email_address_to_find', $sEmailAddressToFind )
			->run( 1 );
		return $oContact;
	}

	/**
	 * @param array[] $aResultSet
	 * @return null
	 */
	protected function filterItemsFromResults( $aResultSet ) {
		$sEmail = $this->getParam( 'email_address_to_find' );
		$oContact = null;
		foreach ( $aResultSet as $aContact ) {
			if ( isset( $aContact[ 'email' ] ) && ( $aContact[ 'email' ] == $sEmail ) ) {
				$oContact = $this->getNewEntityResourceVO()
								 ->applyFromArray( $aContact );
			}
		}
		return $oContact;
	}
}