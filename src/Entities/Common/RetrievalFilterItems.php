<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
 * Class RetrievalFilterItems
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 * @property array $equality_filter_items
 */
class RetrievalFilterItems {

	use DynProperties;

	/**
	 * @param string $key
	 * @param mixed  $mValue
	 * @return $this
	 */
	public function setEqualityFilterItem( $key, $mValue ) {
		$aItems = $this->getEqualityFilterItems();
		$aItems[ $key ] = $mValue;
		return $this->setEqualityFilterItems( $aItems );
	}

	public function getEqualityFilterItems() :array {
		return is_array( $this->equality_filter_items ) ? $this->equality_filter_items : [];
	}

	public function hasEqualityFilterItems() :bool {
		return count( $this->getEqualityFilterItems() ) > 0;
	}

	/**
	 * @param array $items
	 * @return $this
	 */
	public function setEqualityFilterItems( $items ) {
		$this->equality_filter_items = $items;
		return $this;
	}
}