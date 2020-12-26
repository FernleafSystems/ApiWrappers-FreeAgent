<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Trait InvoicesTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
trait InvoicesTrait {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() :string {
		return 'invoices';
	}

	/**
	 * @return InvoiceVO
	 */
	public function getVO() {
		return new InvoiceVO();
	}
}