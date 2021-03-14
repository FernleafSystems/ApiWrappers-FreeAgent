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
	 * @throws \Exception
	 */
	public function asPdf( $sToFile = '' ) {
		$aData = $this->send()
					  ->getCoreResponseData();
		if ( !empty( $sToFile ) ) {
			return (bool)file_put_contents( $sToFile, base64_decode( $aData[ 'content' ] ) );
		}
		return isset( $aData[ 'content' ] ) ? $aData[ 'content' ] : '';
	}

	protected function getRequestDataPayloadKey() :string {
		return 'pdf';
	}

	protected function getUrlEndpoint() :string{
		return sprintf( 'invoices/%s/pdf', $this->entity_id );
	}
}