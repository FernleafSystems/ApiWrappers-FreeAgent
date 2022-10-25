<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Categories;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

class RetrieveBulk extends RetrieveBulkBase {

	protected function getApiEndpoint() :string{
		return 'categories';
	}

	public function getVO():CategoryVO {
		return new CategoryVO();
	}
}