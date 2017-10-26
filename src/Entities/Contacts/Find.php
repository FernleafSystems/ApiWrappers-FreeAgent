<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Find extends RetrieveBulk {

	/**
	 * @return $this
	 */
	public function filterByActive() {
		$this->getFilterItems()
			 ->setEqualityFilterItem( 'status', 'Active' );
		return $this;
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function filterByEmail( $sEmail ) {
		$this->getFilterItems()
			 ->setEqualityFilterItem( 'email', $sEmail );
		return $this;
	}

	/**
	 * @return $this
	 */
	public function filterByHidden() {
		$this->getFilterItems()
			 ->setEqualityFilterItem( 'status', 'Hidden' );
		return $this;
	}
}