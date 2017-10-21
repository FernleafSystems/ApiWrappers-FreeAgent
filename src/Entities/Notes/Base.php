<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Notes;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Notes
 */
class Base extends Api {

	const REQUEST_ENDPOINT = 'notes';

	/**
	 * @return NoteVO
	 */
	public function getNewEntityResourceVO() {
		return new NoteVO();
	}
}