<?php

namespace FernleafSystems\ApiWrappers\Freeagent;

use FernleafSystems\ApiWrappers\Base\BaseApi;
use FernleafSystems\ApiWrappers\Freeagent\OAuth\Provider\Freeagent;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\FreeAgent
 */
class Api extends BaseApi {

	const REQUEST_METHOD = 'get';

	/**
	 * @var Freeagent
	 */
	private $oAuthProvider;

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

	/**
	 * @return FreeAgent
	 */
	protected function getProvider() {
		return $this->oAuthProvider;
	}
}