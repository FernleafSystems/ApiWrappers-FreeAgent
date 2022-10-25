<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Notes;

class Base extends \FernleafSystems\ApiWrappers\Freeagent\Api {

	protected function getApiEndpoint() :string {
		return 'notes';
	}

	public function getVO() :NoteVO{
		return new NoteVO();
	}
}