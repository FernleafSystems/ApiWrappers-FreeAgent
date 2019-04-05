<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Trait InvoicesTrait
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
trait InvoicesTrait {

	/**
	 * @var string
	 */
	protected $aApiEndpoint = 'invoices';

	/**
	 * @return InvoiceVO
	 */
	public function getVO() {
		return new InvoiceVO();
	}
}