<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Common;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class RequestBase
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Common
 */
class RequestBase extends Api {

	/**
	 * @var array
	 */
	protected $aParams;

	/**
	 * @return array
	 */
	public function getParams() {
		if ( !isset( $this->aParams ) ) {
			$this->aParams = array();
		}
		return $this->aParams;
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
		return $this->setParam( $sAttribute, $this->filterDateValue( $mDate ) );
	}

	/**
	 * @param string $sKey
	 * @param mixed  $mValue
	 * @return $this
	 */
	public function setParam( $sKey, $mValue ) {
		$aParams = $this->getParams();
		$aParams[ $sKey ] = $mValue;
		return $this->setParams( $aParams );
	}

	/**
	 * @param array $aParams
	 * @return $this
	 */
	public function setParams( $aParams ) {
		$this->aParams = $aParams;
		return $this;
	}

	/**
	 * @param string $sKey
	 * @return $this
	 */
	public function unsetParam( $sKey ) {
		$aParams = $this->getParams();
		if ( isset( $aParams[ $sKey ] ) ) {
			unset( $aParams[ $sKey ] );
			$this->setParams( $aParams );
		}
		return $this;
	}

	/**
	 * @param int|string $mDate
	 * @return string
	 */
	protected function filterDateValue( $mDate ) {
		return preg_match( '/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $mDate ) ? $mDate : gmdate( 'Y-m-d', $mDate );
	}
}