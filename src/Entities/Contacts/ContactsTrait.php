<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

/**
 * Trait ContactsTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
trait ContactsTrait {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() {
		return 'contacts';
	}

	/**
	 * @return ContactVO
	 */
	public function getVO() {
		return new ContactVO();
	}
}