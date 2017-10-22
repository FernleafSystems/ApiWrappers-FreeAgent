<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Company;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Company
 */
class Base extends Api {

	const REQUEST_ENDPOINT = 'company';

	/**
	 * @return CompanyVO
	 */
	public function getNewEntityResourceVO() {
		return new CompanyVO();
	}
}