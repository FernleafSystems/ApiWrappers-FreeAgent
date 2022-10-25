<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\RecurringInvoices;

use FernleafSystems\ApiWrappers\Freeagent\Entities;

class RecurringInvoicesIterator extends Entities\Common\CommonIterator {

	public function filterByDraft() :self {
		return $this->filterByView( 'draft' );
	}

	public function filterByActive() :self {
		return $this->filterByView( 'active' );
	}

	public function filterByInActive() :self {
		return $this->filterByView( 'inactive' );
	}

	/**
	 * @return RecurringInvoiceVO
	 */
	public function current() {
		return parent::current();
	}

	/**
	 * @return RetrievePage
	 */
	protected function getNewRetriever() {
		return new RetrievePage();
	}
}