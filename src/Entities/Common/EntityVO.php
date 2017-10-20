<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class EntityVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 */
class EntityVO {

	use StdClassAdapter;

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
		return $this->getStringParam( 'url' );
	}
}