<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Company;

use FernleafSystems\ApiWrappers\Freeagent;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Company
 */
class Base extends Freeagent\Api {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() :string {
		return 'company';
	}

	/**
	 * @return CompanyVO
	 */
	public function getVO() {
		return new CompanyVO();
	}
}