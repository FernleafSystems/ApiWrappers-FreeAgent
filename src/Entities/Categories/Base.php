<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Categories;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Categories
 */
class Base extends Api {

	const REQUEST_ENDPOINT = 'categories';

	/**
	 * @return CategoryVO
	 */
	public function getNewEntityResourceVO() {
		return new CategoryVO();
	}
}