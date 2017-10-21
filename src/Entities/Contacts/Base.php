<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class Base extends Api {

	const REQUEST_ENDPOINT = 'contacts';

	/**
	 * @return ContactVO
	 */
	public function getNewEntityResourceVO() {
		return new ContactVO();
	}
}