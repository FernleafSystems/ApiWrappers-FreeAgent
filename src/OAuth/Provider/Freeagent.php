<?php

namespace FernleafSystems\ApiWrappers\Freeagent\OAuth\Provider;

use FernleafSystems\ApiWrappers\Freeagent\OAuth\Entity\Company;
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
	 * Very important points to note about Freeagent Request Options. Ignore at peril to your sanity:
	 * - request_uri must be provided and be identical (IDENTICAL) to the value sent on the Authorization Code request
	 * - Instead of Basic Authorization, ensure client_id and client_secret are included in the params
	 *
	 * @param array $aParams
	 * @return array
	 */
//	protected function getAccessTokenOptions( array $aParams ) {
//		return array(
//			'headers' => [
//				'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8',
//				'Accept'       => 'application/json',
//			],
//			'body'    => $this->getAccessTokenBody( $aParams )
//		);
//	}

	/**
	 * @return string
	 */
	public function getBaseUrl() {
		$bFallback = $this->isSandbox() ? self::URL_SANDBOX : self::URL_LIVE;
		return empty( $this->sBaseUrl ) ? $bFallback : rtrim( $this->sBaseUrl, '/' );
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

	public function urlUserDetails( AccessToken $token = null ) {
		return $this->sBaseUrl.'company';
	}

	public function userDetails( $response, AccessToken $token ) {
		$response = (array)( $response->company );
		$company = new Company( $response );
		return $company;
	}
}