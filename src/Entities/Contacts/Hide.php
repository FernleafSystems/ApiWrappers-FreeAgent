<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

class Hide extends Update {

	public function hide() :?ContactVO {
		return $this->setStatus( 'Hidden' )->update();
	}
}