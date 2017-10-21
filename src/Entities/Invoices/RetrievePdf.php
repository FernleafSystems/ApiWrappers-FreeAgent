<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Class RetrievePdf
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class RetrievePdf extends Retrieve {

	/**
	 * @param string $sToFile
	 * @return bool|string base64 encoded string
	 */
	public function asPdf( $sToFile = '' ) {
		$aData = $this->send()
					  ->getCoreResponseData();
		if ( !empty( $sToFile ) ) {
			return (bool)file_put_contents( $sToFile, base64_decode( $aData[ 'content' ] ) );
		}
		return isset( $aData[ 'content' ] ) ? $aData[ 'content' ] : '';
	}

	/**
	 * Chops off the trailing 's' from the data package key. So far no exceptions found.
	 * @return string
	 */
	protected function getDataPackageKey() {
		return 'pdf';
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'invoices/%s/pdf', $this->getEntityId() );
	}
}