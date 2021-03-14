<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\RecurringInvoices;

trait RecurringInvoicesTrait {

	protected function getApiEndpoint() :string {
		return 'recurring_invoices';
	}

	public function getVO() :RecurringInvoiceVO {
		return new RecurringInvoiceVO();
	}
}