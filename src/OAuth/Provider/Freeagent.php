<?php

namespace FernleafSystems\ApiWrappers\Freeagent\OAuth\Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Freeagent
 * @package FernleafSystems\ApiWrappers\Freeagent\OAuth\Provider
 */
class Freeagent extends AbstractProvider {

	const URL_LIVE = 'https://api.freeagent.com/v2';
	const URL_SANDBOX = 'https://api.sandbox.freeagent.com/v2';
	/**
	 * @var bool
	 */
	protected $bIsSandbox;
	/**
	 * @var bool
	 */
	protected $sBaseUrl;

	protected function checkResponse( ResponseInterface $response, $data ) {
		// TODO: Implement checkResponse() method.
	}

	protected function createResourceOwner( array $response, AccessToken $token ) {
		// TODO: Implement createResourceOwner() method.
	}

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		$bFallback = $this->isSandbox() ? self::URL_SANDBOX : self::URL_LIVE;
		return empty( $this->sBaseUrl ) ? $bFallback : $this->sBaseUrl;
	}

	/**
	 * @return string
	 */
	public function getBaseAuthorizationUrl() {
		return $this->getBaseUrl().'/approve_app';
	}

	/**
	 * @return string
	 */
	public function getBaseAccessTokenUrl( array $aParams ) {
		return $this->getBaseUrl().'/token_endpoint';
	}

	/**
	 * @return string
	 */
	public function getResourceOwnerDetailsUrl( AccessToken $token ) {
		return $this->getBaseUrl().'/company';
	}

	protected function getDefaultScopes() {
		// TODO: Implement getDefaultScopes() method.
	}

	/**
	 * @return bool
	 */
	public function isSandbox() {
		return (bool)$this->bIsSandbox;
	}

	/**
	 * @param string $sUrl
	 * @return $this
	 */
	public function setBaseUrl( $sUrl ) {
		$this->sBaseUrl = $sUrl;
		return $this;
	}

	/**
	 * @param bool $bIsSandbox
	 * @return $this
	 */
	public function setIsSandbox( $bIsSandbox ) {
		$this->bIsSandbox = (bool)$bIsSandbox;
		return $this;
	}
}