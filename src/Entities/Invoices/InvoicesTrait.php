<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Trait InvoicesTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
trait InvoicesTrait {

	protected function getApiEndpoint() :string {
		return 'invoices';
	}

	public function getVO() :InvoiceVO {
		return new InvoiceVO();
	}
}