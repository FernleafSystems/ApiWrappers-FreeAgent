<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class EntityVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 * @property string $url
 */
class EntityVO extends BaseVO {

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