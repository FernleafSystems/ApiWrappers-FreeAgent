<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Notes;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/notes
 * @property string $author
 * @property string $note
 * @property string $parent_url
 */
class NoteVO extends EntityVO {

	/**
	 * @return string
	 * @deprecated
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getContent() {
		return $this->note;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getParentUri() {
		return $this->parent_url;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getCreatedAt() {
		return $this->created_at;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getUpdatedAt() {
		return $this->updated_at;
	}
}