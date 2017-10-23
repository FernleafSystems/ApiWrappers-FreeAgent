<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\FindBase;
use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

/**
 * Class Find
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Find extends FindBase {

	const REQUEST_ENDPOINT = 'bills';

	/**
	 * @return BillVO[]
	 */
	public function find() {
		/** @var BillVO[] $aBills */
		$aBills = array();

		$aResults = $this->send()
						 ->getCoreResponseData();

		if ( !empty( $aResults ) ) {
			$aBills = array_map(
				function ( $aBill ) {
					return ( new BillVO() )->applyFromArray( $aBill );
				},
				$aResults
			);

			$sReference = $this->getStringParam( 'bill_reference' );
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
		$aBills = $this->setParam( 'bill_reference', $sBillReference )
					   ->find();
		return ( isset( $aBills[ 0 ] ) ? $aBills[ 0 ] : null );
	}

	/**
	 * @param ContactVO $oContact
	 * @return $this
	 */
	public function setContact( $oContact ) {
		return $this->setRequestDataItem( 'contact', $oContact->getUri() );
	}

	/**
	 * @param string $sBillReference
	 * @return $this
	 */
	public function setBillReference( $sBillReference ) {
		return $this->setRequestDataItem( 'reference', $sBillReference );
	}
}