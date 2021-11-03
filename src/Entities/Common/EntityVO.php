<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * @property string $url
 * @property string $created_at - 2011-07-28T11:25:11Z
 * @property string $updated_at - 2011-07-28T11:25:11Z
 */
class EntityVO extends BaseVO {

	/**
	 * @return int
	 */
	public function getCreatedAt() {
		return strtotime( $this->created_at );
	}

	/**
	 * @return int
	 */
	public function getUpdatedAt() {
		return strtotime( $this->updated_at );
	}

	/**
	 * @param string $url
	 * @return string
	 */
	public function getIdFromEntityUrl( $url ) {
		return basename( $url );
	}

	/**
	 * @return string
	 */
	public function getId() {
		return empty( $this->id ) ? $this->getIdFromEntityUrl( $this->url ) : $this->id;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getUri() {
		return $this->url;
	}
}