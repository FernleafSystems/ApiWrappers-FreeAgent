<?php

namespace FernleafSystems\ApiWrappers\FreeAgent;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\FreeAgent
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	use StdClassAdapter;

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		return 'https://api.freeagent.com/v2';
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
	 * @return string
	 */
	public function getClientSecret() {
		return $this->getStringParam( 'client_secret' );
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
	 * @param string $sVal
	 * @return $this
	 */
	public function setClientSecret( $sVal ) {
		return $this->setParam( 'client_secret', $sVal );
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
