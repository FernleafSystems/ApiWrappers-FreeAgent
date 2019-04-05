<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

/**
 * Trait ContactsTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
trait ContactsTrait {

	/**
	 * @var string
	 */
	protected $aApiEndpoint = 'contacts';

	/**
	 * @return ContactVO
	 */
	public function getVO() {
		return new ContactVO();
	}
}