<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Company;

use FernleafSystems\ApiWrappers\Freeagent;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Company
 */
class Base extends Freeagent\Api {

	/**
	 * @var string
	 */
	protected $aApiEndpoint = 'company';

	/**
	 * @return CompanyVO
	 */
	public function getVO() {
		return new CompanyVO();
	}
}