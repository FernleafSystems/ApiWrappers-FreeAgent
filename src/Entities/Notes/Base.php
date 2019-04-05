<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Notes;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Notes
 */
class Base extends Api {

	/**
	 * @var string
	 */
	protected $aApiEndpoint = 'notes';

	/**
	 * @return NoteVO
	 */
	public function getVO() {
		return new NoteVO();
	}
}