<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent\Api;
use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class Retrieve extends Api {

	use StdClassAdapter;

	/**
	 * @param int    $nId
	 * @param string $sToFile
	 * @return bool|string base64 encoded string
	 */
	public function asPdf( $nId, $sToFile = '' ) {
		$aData = $this->getFreeagentApi()
					  ->getInvoiceAsPdf( $nId )->array;
		if ( !empty( $sToFile ) ) {
			return (bool)file_put_contents( $sToFile, base64_decode( $aData[ 'content' ] ) );
		}
		return isset( $aData[ 'content' ] ) ? $aData[ 'content' ] : '';
	}

	/**
	 * @param int $nId
	 * @return InvoiceVO|null
	 */
	public function asVo( $nId ) {
		$aData = $this->retrieve( $nId );
		return !empty( $aData ) ? ( new InvoiceVO() )->applyFromArray( $aData ) : null;
	}

	/**
	 * @param int $nId
	 * @return array
	 */
	public function retrieve( $nId ) {
		return $this->getFreeagentApi()
					->getInvoice( $nId, $this->getRawDataAsArray() )->array;
	}

	/**
	 * @param bool $bInclude
	 * @return $this
	 */
	public function setIncludeLineItems( $bInclude = true ) {
		return $this->setParam( 'nested_invoice_items', $bInclude ? 'true' : 'false' );
	}
}