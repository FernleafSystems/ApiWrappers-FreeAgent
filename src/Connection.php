<?php

namespace FernleafSystems\ApiWrappers\Freeagent;

use FernleafSystems\ApiWrappers\Freeagent\OAuth\Provider\Freeagent;
use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Freeagent
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getAccessToken() {
		return $this->getStringParam( 'access_token' );
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
	 */
	public function getBaseUrlOverride() {
		return $this->getStringParam( 'base_url_override', '' );
	}

	/**
	 * @return string
	 */
	public function getClientId() {
		return $this->getStringParam( 'client_id' );
	}

	/**
	 * @return string
	 */
	public function getExpiration() {
		return $this->getNumericParam( 'expiration' );
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
			->setBaseUrl( $this->getBaseUrlOverride() )
			->setIsSandbox( $this->isSandbox() );
	}

	/**
	 * @return string
	 */
	public function getUrlAccessToken() {
		return $this->getStringParam( 'uri_redirect' );
	}

	/**
	 * @return string
	 */
	public function getUrlAuthorize() {
		return $this->getStringParam( 'uri_redirect' );
	}

	/**
	 * @return string
	 */
	public function getUrlResourceDetails() {
		return $this->getStringParam( 'uri_resource' );
	}

	/**
	 * @return bool
	 */
	public function isSandbox() {
		return (bool)$this->getParam( 'sandbox' );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setAccessToken( $sVal ) {
		return $this->setParam( 'access_token', $sVal );
	}

	/**
	 * @param string $sUrl
	 * @return $this
	 */
	public function setBaseUrlOverride( $sUrl ) {
		return $this->setParam( 'base_url_override', $sUrl );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setClientId( $sVal ) {
		return $this->setParam( 'client_id', $sVal );
	}

	/**
	 * @param int $nVal
	 * @return $this
	 */
	public function setExpiration( $nVal ) {
		return $this->setParam( 'expiration', $nVal );
	}

	/**
	 * @param bool $bIsSandbox
	 * @return $this
	 */
	public function setIsSandbox( $bIsSandbox ) {
		return $this->setParam( 'sandbox', $bIsSandbox );
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
		return $this->setParam( 'uri_redirect', $sVal );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setUrlAuthorize( $sVal ) {
		return $this->setParam( 'uri_auth', $sVal );
	}

	/**
	 * @param string $sVal
	 * @return $this
	 */
	public function setUrlResourceDetails( $sVal ) {
		return $this->setParam( 'uri_resource', $sVal );
	}
}