<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
 * @property array $equality_filter_items
 */
class RetrievalFilterItems {

	use DynProperties;

	/**
	 * @param string $key
	 * @param mixed  $value
	 * @return $this
	 */
	public function setEqualityFilterItem( $key, $value ) {
		$items = $this->getEqualityFilterItems();
		$items[ $key ] = $value;
		return $this->setEqualityFilterItems( $items );
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