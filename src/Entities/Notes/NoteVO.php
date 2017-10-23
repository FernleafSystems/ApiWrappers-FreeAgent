<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Notes;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/notes
 *
 * Class NoteVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Notes
 */
class NoteVO extends EntityVO {


	/**
	 * @return string
	 */
	public function getAuthor() {
		return $this->getStringParam( 'author' );
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->getStringParam( 'note' );
	}

	/**
	 * @return string
	 */
	public function getParentUri() {
		return $this->getStringParam( 'parent_url' );
	}

	/**
	 * @return int UTC
	 */
	public function getCreatedAt() {
		return $this->getStringParam( 'created_at' );
	}

	/**
	 * @return int UTC
	 */
	public function getUpdatedAt() {
		return $this->getStringParam( 'updated_at' );
	}
}