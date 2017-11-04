<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Company;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Company
 */
class Retrieve extends Base {

	/**
	 * @return bool
	 */
	public function exists() {
		return !is_null( $this->retrieve() );
	}

	/**
	 * @return CompanyVO
	 */
	public function retrieve() {
		return $this->sendRequestWithVoResponse();
	}
}