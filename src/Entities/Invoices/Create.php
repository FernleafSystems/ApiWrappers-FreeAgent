<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class Create extends Api {

	/**
	 * @param array $aNewData
	 * @return InvoiceVO|null
	 */
	public function create( $aNewData ) {
		$oResult = $this->getFreeagentApi()
						->createInvoice( $aNewData );

		$oNew = null;
		if ( !empty( $oResult->array ) ) {
			$oNew = ( new InvoiceVO() )->applyFromArray( $oResult->array );
		}
		return $oNew;
	}
}