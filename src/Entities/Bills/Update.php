<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

/**
 * Class Update
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Update extends Create {

	const REQUEST_METHOD = 'put';

	/**
	 * @param array $aUpdateData
	 * @return BillVO|null
	 */
	public function update( $aUpdateData = array() ) {
		return $this->create( $aUpdateData );
	}
}