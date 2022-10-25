<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts;

class Hide extends Update {

	/**
	 * @return ContactVO|null
	 */
	public function hide() {
		return $this->setStatus( 'Hidden' )
					->update();
	}
}