<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent;

use FernleafSystems\ApiWrappers\Freeagent\OAuth\Provider\Freeagent;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Freeagent
 * @property Freeagent $oauth_provider
 * @property string    $access_token
 * @property string    $base_url_override
 * @property string    $client_id
 * @property string    $uri_auth
 * @property string    $uri_redirect
 * @property string    $uri_resource
 * @property int       $expiration
 * @property bool      $sandbox
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	/**
	 * @return string
	 * @deprecated
	 */
	public function getAccessToken() {
		return $this->access_token;
	}

	public function getBaseUrl() :string {
		return $this->getOAuthProvider()->getBaseUrl();
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
		$provider = $this->oauth_provider;
		if ( !$provider instanceof Freeagent ) {
			$provider = new Freeagent();
			$this->setOAuthProvider( $provider );
		}
		return $provider
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

	public function isSandbox() :bool {
		return (bool)$this->sandbox;
	}

	public function setAccessToken( string $token ) :self {
		$this->access_token = $token;
		return $this;
	}

	public function setBaseUrlOverride( string $url ) :self {
		$this->base_url_override = $url;
		return $this;
	}

	public function setClientId( string $id ) :self {
		$this->client_id = $id;
		return $this;
	}

	/**
	 * @param int $nVal
	 * @return $this
	 */
	public function setExpiration( $nVal ) :self {
		$this->expiration = $nVal;
		return $this;
	}

	/**
	 * @param bool $isSandbox
	 * @return $this
	 */
	public function setIsSandbox( $isSandbox ) :self {
		$this->sandbox = $isSandbox;
		return $this;
	}

	/**
	 * @param Freeagent $provider
	 * @return $this
	 */
	public function setOAuthProvider( $provider ) :self {
		$this->oauth_provider = $provider;
		return $this;
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