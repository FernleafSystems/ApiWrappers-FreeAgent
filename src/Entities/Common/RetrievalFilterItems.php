<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class RetrievalFilterItems
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 */
class RetrievalFilterItems {

	use StdClassAdapter;

	/**
	 * @param string $sKey
	 * @param mixed $mValue
	 * @return $this
	 */
	public function addEqualityFilterItem( $sKey, $mValue ) {
		$aItems = $this->getEqualityFilterItems();
		$aItems[ $sKey ] = $mValue;
		return $this->setEqualityFilterItems( $aItems );
	}

	/**
	 * @return array
	 */
	public function getEqualityFilterItems() {
		$aItems = $this->getArrayParam( 'equality_filter_items' );
		if ( !is_array( $aItems ) ) {
			$aItems = array();
		}
		return $aItems;
	}

	/**
	 * @return bool
	 */
	public function hasEqualityFilterItems() {
		return ( count( $this->getEqualityFilterItems() ) > 0 );
	}

	/**
	 * @param array $aItems
	 * @return $this
	 */
	public function setEqualityFilterItems( $aItems ) {
		return $this->setParam( 'equality_filter_items', $aItems );
	}
}