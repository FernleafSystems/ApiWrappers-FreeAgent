<?php

namespace FernleafSystems\ApiWrappers\Freeagent;

use FernleafSystems\ApiWrappers\Base\BaseApi;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class Api
 * @package FernleafSystems\ApiWrappers\FreeAgent
 * @property string $entity_id
 */
class Api extends BaseApi {

	const REQUEST_METHOD = 'get';

	/**
	 * @param int $nTimestamp
	 * @return string
	 */
	public static function convertToStdDateFormat( $nTimestamp ) {
		return gmdate( 'Y-m-d', $nTimestamp );
	}

	protected function prepFinalRequestData() :array {

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
	protected function getRequestDataPayloadKey() :string {
		return rtrim( $this->getApiEndpoint(), 's' );
	}

	protected function getResponseDataPayloadKey() :string {
		return $this->getRequestDataPayloadKey();
	}

	/**
	 * @return array|null
	 */
	public function getCoreResponseData() {
		$data = null;
		if ( $this->isLastRequestSuccess() ) {
			$key = $this->getResponseDataPayloadKey();
			$decoded = $this->getDecodedResponseBody();
			$data = empty( $key ) ? $decoded : $decoded[ $key ];
		}
		return $data;
	}

	/**
	 * @return int|string
	 * @deprecated 1.0
	 */
	public function getEntityId() {
		return $this->entity_id;
	}

	public function getVO() :EntityVO {
		return new EntityVO();
	}

	protected function getApiEndpoint() :string {
		return '';
	}

	protected function getUrlEndpoint() :string {
		$base = $this->getApiEndpoint();
		return $this->hasEntityId() ? sprintf( '%s/%s', $base, $this->entity_id ) : $base;
	}

	public function hasEntityId() :bool {
		return !is_null( $this->entity_id );
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
		$data = $this->req()->getCoreResponseData();

		$VO = null;
		if ( !empty( $data ) ) {
			$VO = $this->getVO()->applyFromArray( $data );
		}
		return $VO;
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

	public function setEntityId( $id ) :self {
		$this->entity_id = is_numeric( $id ) ? (int)$id : $id;
		return $this;
	}

	/**
	 * @param int|string $mDate
	 * @return string
	 */
	protected function filterDateValue( $mDate ) {
		return preg_match( '/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $mDate ) ? $mDate : $this->convertToStdDateFormat( $mDate );
	}

	/**
	 * @return EntityVO
	 * @deprecated
	 */
	public function getNewEntityResourceVO() {
		return $this->getVO();
	}

	/**
	 * @return string
	 * @deprecated
	 */
	protected function getRequestEndpoint() {
		return $this->getApiEndpoint();
	}
}