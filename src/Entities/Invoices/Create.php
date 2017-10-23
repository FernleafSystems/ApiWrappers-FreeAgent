<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @param array $aData
	 * @return InvoiceVO|null
	 */
	public function create( $aData = array() ) {
		return $this->setRequestData( $aData, true )
					->sendRequestWithVoResponse();
	}
}