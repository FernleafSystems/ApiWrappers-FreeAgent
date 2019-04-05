<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Categories;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Categories
 */
class RetrieveBulk extends RetrieveBulkBase {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() {
		return 'categories';
	}

	/**
	 * @return CategoryVO
	 */
	public function getVO() {
		return new CategoryVO();
	}
}