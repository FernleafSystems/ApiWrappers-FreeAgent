<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

trait ContactsTrait {

	protected function getApiEndpoint() :string {
		return 'contacts';
	}

	public function getVO() :ContactVO {
		return new ContactVO();
	}
}