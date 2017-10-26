<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

/**
 * Class RetrieveBulk
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts
 */
class RetrieveBulk extends RetrieveBulkBase {

	const REQUEST_ENDPOINT = 'contacts';

	/**
	 * @return ContactVO
	 */
	public function getNewEntityResourceVO() {
		return new ContactVO();
	}
}