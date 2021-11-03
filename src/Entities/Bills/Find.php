<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Find extends RetrieveBulk {

	/**
	 * @param ContactVO $contact
	 * @return $this
	 */
	public function filterByContact( $contact ) {
		return $this->setRequestDataItem( 'contact', $contact->url );
	}

	/**
	 * @return $this
	 */
	public function filterByOpen() {
		return $this->setViewFilter( 'open' );
	}

	/**
	 * @return $this
	 */
	public function filterByOverdue() {
		return $this->setViewFilter( 'overdue' );
	}

	/**
	 * @return $this
	 */
	public function filterByOpenOrOverdue() {
		return $this->setViewFilter( 'open_or_overdue' );
	}

	/**
	 * @return $this
	 */
	public function filterByPaid() {
		return $this->setViewFilter( 'paid' );
	}

	/**
	 * @return $this
	 */
	public function filterByRecurring() {
		return $this->setViewFilter( 'recurring' );
	}

	/**
	 * @param string $sReference
	 * @return $this
	 */
	public function filterByReference( $sReference ) {
		$this->getFilterItems()
			 ->setEqualityFilterItem( 'reference', $sReference );
		return $this;
	}
}