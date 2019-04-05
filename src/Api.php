<?php

namespace FernleafSystems\ApiWrappers\Freeagent;

use FernleafSystems\ApiWrappers\Base\BaseApi;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

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

		$aFinal = parent::prepFinalRequestData();

		$sChannel = $this->getDataChannel();
		if ( in_array( $this->getHttpRequestMethod(), [ 'post', 'put' ] ) ) {
			$sDataPayloadKey = $this->getRequestDataPayloadKey();
			if ( !empty( $sDataPayloadKey ) && !empty( $aFinal[ $sChannel ] ) ) {
				$aFinal[ $sChannel ] = [ $sDataPayloadKey => $aFinal[ $sChannel ] ];
			}
		}

		return $aFinal;
	}

	protected function preFlight() {
		/** @var Connection $oCon */
		$oCon = $this->getConnection();
		$this->setRequestHeader( 'Authorization', sprintf( 'Bearer %s', $oCon->access_token ) );
	}

	/**
	 * Chops off the trailing 's' from the data package key. Only exceptions are paged results.
	 * @return string
	 */
	protected function getRequestDataPayloadKey() {
		return rtrim( $this->getApiEndpoint(), 's' );
	}

	/**
	 * @return string
	 */
	protected function getResponseDataPayloadKey() {
		return $this->getRequestDataPayloadKey();
	}

	/**
	 * @return array|null
	 */
	public function getCoreResponseData() {
		$aData = null;
		if ( $this->isLastRequestSuccess() ) {
			$sKey = $this->getResponseDataPayloadKey();
			$aDecoded = $this->getDecodedResponseBody();
			$aData = empty( $sKey ) ? $aDecoded : $aDecoded[ $sKey ];
		}
		return $aData;
	}

	/**
	 * @return int|string
	 */
	public function getEntityId() {
		return $this->getParam( 'entity_id' );
	}

	/**
	 * @return EntityVO
	 */
	public function getVO() {
		return new EntityVO();
	}

	/**
	 * @return string
	 */
	protected function getApiEndpoint() {
		return '';
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		$sBase = $this->getApiEndpoint();
		return $this->hasEntityId() ? sprintf( '%s/%s', $sBase, $this->getEntityId() ) : $sBase;
	}

	/**
	 * @return bool
	 */
	public function hasEntityId() {
		return !is_null( $this->getEntityId() );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( strlen( $this->getApiEndpoint() ) == 0 ) {
			throw new \Exception( 'Request Endpoint has not been provided' );
		}
	}

	/**
	 * @return EntityVO|mixed|null
	 */
	public function sendRequestWithVoResponse() {
		$aData = $this->req()
					  ->getCoreResponseData();

		$oNew = null;
		if ( !empty( $aData ) ) {
			$oNew = $this->getVO()->applyFromArray( $aData );
		}
		return $oNew;
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
		return $this->setParam( 'entity_id', is_numeric( $nId ) ? (int)$nId : $nId );
	}

	/**
	 * @param int|string $mDate
	 * @return string
	 */
	protected function filterDateValue( $mDate ) {
		return preg_match( '/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $mDate ) ? $mDate : gmdate( 'Y-m-d', $mDate );
	}

	/**
	 * @deprecated
	 * @return EntityVO
	 */
	public function getNewEntityResourceVO() {
		return $this->getVO();
	}

	/**
	 * @deprecated
	 * @return string
	 */
	protected function getRequestEndpoint() {
		return $this->getApiEndpoint();
	}
}