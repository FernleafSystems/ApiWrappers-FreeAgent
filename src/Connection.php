<?php

namespace FernleafSystems\ApiWrappers\Freeagent;

use FernleafSystems\ApiWrappers\Freeagent\OAuth\Provider\Freeagent;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Freeagent
 * @property string $access_token
 * @property string $base_url_override
 * @property string $client_id
 * @property string $uri_auth
 * @property string $uri_redirect
 * @property string $uri_resource
 * @property int    $expiration
 * @property bool   $sandbox
 *
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	/**
	 * @return string
	 * @deprecated
	 */
	public function getAccessToken() {
		return $this->access_token;
	}

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return $this->getOAuthProvider()
					->getBaseUrl();
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getBaseUrlOverride() {
		return $this->base_url_override;
	}

	/**
	 * @return string
	 */
	public function getClientId() {
		return $this->client_id;
	}

	/**
	 * @return int
	 */
	public function getExpiration() {
		return $this->expiration;
	}

	/**
	 * @return Freeagent
	 */
	public function getOAuthProvider() {
		$oProvider = $this->getParam( 'oauth_provider' );
		if ( !( $oProvider instanceof Freeagent ) ) {
			$oProvider = new Freeagent();
			$this->setOAuthProvider( $oProvider );
		}
		return $oProvider
			->setBaseUrl( $this->base_url_override )
			->setIsSandbox( $this->sandbox );
	}

	/**
	 * @return string
	 */
	public function getUrlAccessToken() {
		return $this->uri_redirect;
	}

	/**
	 * @return string
	 */
	public function getUrlAuthorize() {
		return $this->uri_redirect;
	}

	/**
	 * @return string
	 */
	public function getUrlResourceDetails() {
		return $this->uri_resource;
	}

	/**
	 * @return bool
	 */
	public function isSandbox() {
		return (bool)$this->sandbox;
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setAccessToken( $sVal ) {
		$this->access_token = $sVal;
		return $this;
	}

	/**
	 * @param string $sUrl
	 * @return $this
	 */
	public function setBaseUrlOverride( $sUrl ) {
		$this->base_url_override = $sUrl;
		return $this;
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setClientId( $sVal ) {
		$this->client_id = $sVal;
		return $this;
	}

	/**
	 * @param int $nVal
	 * @return $this
	 */
	public function setExpiration( $nVal ) {
		$this->expiration = $nVal;
		return $this;
	}

	/**
	 * @param bool $bIsSandbox
	 * @return $this
	 */
	public function setIsSandbox( $bIsSandbox ) {
		$this->sandbox = $bIsSandbox;
		return $this;
	}

	/**
	 * @param Freeagent $oProvider
	 * @return $this
	 */
	public function setOAuthProvider( $oProvider ) {
		return $this->setParam( 'oauth_provider', $oProvider );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setUrlAccessToken( $sVal ) {
		$this->uri_redirect = $sVal;
		return $this;
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setUrlAuthorize( $sVal ) {
		$this->uri_auth = $sVal;
		return $this;
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setUrlResourceDetails( $sVal ) {
		$this->uri_resource = $sVal;
		return $this;
	}
}