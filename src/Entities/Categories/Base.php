<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Categories;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Categories
 */
class Base extends Api {

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