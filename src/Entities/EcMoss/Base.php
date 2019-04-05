<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\EcMoss;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\EcMoss
 */
class Base extends Api {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() {
		return 'ec_moss';
	}
}