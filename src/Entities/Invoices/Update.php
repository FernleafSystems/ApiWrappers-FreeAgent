<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * Class Update
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class Update extends Api {

	/**
	 * @param int $nInvoiceId
	 * @param array $aNewData
	 * @return InvoiceVO|null
	 */
	public function update( $nInvoiceId, $aNewData ) {
		$oResult = $this->getFreeagentApi()
						->updateInvoice( $nInvoiceId, $aNewData );

		$oNew = null;
		if ( !empty( $oResult->array ) ) {
			$oNew = ( new InvoiceVO() )->applyFromArray( $oResult->array );
		}
		return $oNew;
	}
}