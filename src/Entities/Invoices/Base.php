<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent;

/**
 * Class Base
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class Base extends Freeagent\Api {

	const REQUEST_ENDPOINT = 'invoices';

	/**
	 * @return InvoiceVO
	 */
	public function getNewEntityResourceVO() {
		return new InvoiceVO();
	}
}