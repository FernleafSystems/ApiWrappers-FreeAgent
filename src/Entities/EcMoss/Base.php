<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\EcMoss;

use FernleafSystems\ApiWrappers\Freeagent\Api;

class Base extends Api {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() :string {
		return 'ec_moss';
	}
}