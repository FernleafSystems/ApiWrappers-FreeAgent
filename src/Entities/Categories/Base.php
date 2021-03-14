<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Categories;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Categories
 */
class Base extends Api {

	protected function getApiEndpoint() :string {
		return 'categories';
	}

	public function getVO() :CategoryVO{
		return new CategoryVO();
	}
}