<?php

namespace FernleafSystems\ApiWrappers\FreeAgent;

use FernleafSystems\ApiWrappers\Base\BaseApi;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\FreeAgent
 */
class Api extends BaseApi {

	const REQUEST_METHOD = 'get';

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		$this->setRequestDataItem( 'key', $this->getConnection()->getApiKey() );
		return parent::prepFinalRequestData();
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$sBase = sprintf( $oCon->getBaseUrl() );
		return rtrim( $sBase, '/' ) . '/';
	}
}