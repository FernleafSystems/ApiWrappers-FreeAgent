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

		$this->getFilterItems()
			 ->addEqualityFilterItem( 'email', $sEmailAddressToFind );

		/** @var ContactVO[] $oContact */
		$aContacts = $this->setResultsLimit( 1 )
						  ->run();
		return count( $aContacts ) ? $aContacts[ 0 ] : null;
	}
}