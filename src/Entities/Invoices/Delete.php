<?php declare(strict_types=1);

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

class Delete extends Base {

	public const REQUEST_METHOD = 'delete';

	public function delete( int $invoiceID = 0 ) :self {
		if ( $invoiceID > 0 ) {
			$this->setEntityId( $invoiceID );
            $this->send();
		}
		return $this;
	}
}