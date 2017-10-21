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
	const REQUEST_ENDPOINT = '';
	/**
	 * @var string
	 */
	protected $sRequestEndpoint = '';
	/**
	 * @var Freeagent
	 */
	private $oAuthProvider;

	/**
	 * @return Freeagent
	 */
	public function getOAuthProvider() {
		if ( empty( $this->oAuthProvider ) ) {
			$this->oAuthProvider = new Freeagent();
		}

		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		return $this->oAuthProvider
			->setBaseUrl( $this->getBaseUrl() )
			->setIsSandbox( $oCon->isSandbox() );
	}

	/**
	 * @return array
	 */
	protected function prepFinalRequestData() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$this->setRequestHeader( 'Authorization', sprintf( 'Bearer %s', $oCon->getAccessToken() ) );

		$aFinal = array(
			'headers' => $this->getRequestHeaders()
		);

		// Where does the data get sent, as a query, or post/put body
		$sDataBodyKey = ( $this->getHttpRequestMethod() == 'get' ) ? 'query' : 'json';

		if ( in_array( $this->getHttpRequestMethod(), [ 'post', 'put' ] ) ) {
			$aFinal[ $sDataBodyKey ] = [ $this->getDataPackageKey() => $this->getRequestDataFinal() ];
		}
		else {
			$aFinal[ $sDataBodyKey ] = $this->getRequestDataFinal();
		}

		return $aFinal;
	}

	/**
	 * @return string
	 */
	protected function getBaseUrl() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$sBase = sprintf( $oCon->getBaseUrl() );
		return rtrim( $sBase, '/' ).'/';
	}

	/**
	 * Chops off the trailing 's' from the data package key. So far no exceptions found.
	 * @return string
	 */
	protected function getDataPackageKey() {
		return rtrim( $this->getRequestEndpoint(), 's' );
	}

	/**
	 * @return array|null
	 */
	public function getCoreResponseData() {
		$aData = null;
		if ( $this->isLastRequestSuccess() ) {
			$aData = $this->getDecodedResponseBody()[ $this->getDataPackageKey() ];
		}
		return $aData;
	}

	/**
	 * @return int
	 */
	public function getEntityId() {
		return $this->getNumericParam( 'entity_id' );
	}

	/**
	 * @return string
	 */
	protected function getRequestEndpoint() {
		$sBase = strtolower( static::REQUEST_ENDPOINT );
		return $this->hasEntityId() ? sprintf( '%s/%s', $sBase, $this->getEntityId() ) : $sBase;
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return $this->getRequestEndpoint();
	}

	/**
	 * @return bool
	 */
	public function hasEntityId() {
		return !is_null( $this->getEntityId() );
	}

	/**
	 * @param int|string $mDatedOn
	 * @return $this
	 */
	public function setDatedOn( $mDatedOn ) {
		return $this->setDateAttribute( 'dated_on', $mDatedOn );
	}

	/**
	 * @param string     $sAttribute
	 * @param int|string $mDate
	 * @return $this
	 */
	public function setDateAttribute( $sAttribute, $mDate ) {
		return $this->setRequestDataItem( $sAttribute, $this->filterDateValue( $mDate ) );
	}

	/**
	 * @param int $nId
	 * @return $this
	 */
	public function setEntityId( $nId ) {
		return $this->setParam( 'entity_id', (int)$nId );
	}

	/**
	 * @param int|string $mDate
	 * @return string
	 */
	protected function filterDateValue( $mDate ) {
		return preg_match( '/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $mDate ) ? $mDate : gmdate( 'Y-m-d', $mDate );
	}
}