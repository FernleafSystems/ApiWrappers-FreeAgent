<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Company;

use FernleafSystems\ApiWrappers\Freeagent;

class Base extends Freeagent\Api {

	protected function getApiEndpoint() :string {
		return 'company';
	}

	public function getVO() :CompanyVO{
		return new CompanyVO();
	}
}