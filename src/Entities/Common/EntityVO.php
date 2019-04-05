<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class EntityVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
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
	 * @return string
	 */
	public function getId() {
		$sId = $this->getParam( 'id' );
		if ( empty( $sId ) ) {
			$sId = basename( $this->getUri() );
		}
		return $sId;
	}

	/**
	 * @return string
	 */
	public function getUri() {
		return $this->url;
	}
}