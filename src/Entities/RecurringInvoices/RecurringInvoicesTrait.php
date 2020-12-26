<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\RecurringInvoices;

trait RecurringInvoicesTrait {

	/**
	 * @return string
	 */
	protected function getApiEndpoint() :string {
		return 'recurring_invoices';
	}

	/**
	 * @return RecurringInvoiceVO
	 */
	public function getVO() {
		return new RecurringInvoiceVO();
	}
}