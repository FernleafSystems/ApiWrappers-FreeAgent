<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\FindBase;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Find extends FindBase {

	/**
	 * @return BillVO[]
	 */
	public function find() {
		/** @var BillVO[] $aBills */
		$aBills = array();

		$aParams = $this->getParams();
		if ( isset( $aParams[ 'reference' ] ) ) { // not a true API parameter
			$sReference = $aParams[ 'reference' ];
			unset( $aParams[ 'reference' ] );
		}
		else {
			$sReference = null;
		}

		$oResult = $this->getFreeagentApi()
						->getBills( $aParams );

		if ( $oResult->success && !empty( $oResult->array ) ) {
			$aBills = array_map(
				function ( $aBill ) {
					return ( new BillVO() )->applyFromArray( $aBill );
				},
				$oResult->array
			);

			if ( !empty( $sReference ) ) {
				foreach ( $aBills as $nKey => $oBill ) {
					if ( $sReference != $oBill->getReference() ) {
						unset( $aBills[ $nKey ] );
					}
				}
			}
		}

		return array_values( $aBills );
	}

	/**
	 * @param string $sBillReference
	 * @return BillVO|null
	 */
	public function findByReference( $sBillReference ) {
		$aBills = $this->setBillReference( $sBillReference )
					   ->find();
		return ( isset( $aBills[ 0 ] ) ? $aBills[ 0 ] : null );
	}

	/**
	 * @param ContactVO $oContact
	 * @return $this
	 */
	public function setContact( $oContact ) {
		return $this->setParam( 'contact', $oContact->getUri() );
	}

	/**
	 * @param string $sBillReference
	 * @return $this
	 */
	public function setBillReference( $sBillReference ) {
		return $this->setParam( 'reference', $sBillReference );
	}
}