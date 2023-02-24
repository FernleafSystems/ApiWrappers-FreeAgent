<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactionExplanation;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\Base;

class Delete extends Base {

	public const REQUEST_METHOD = 'delete';

	public function delete( int $explanationID ) :self {
		return $this->setEntityId( $explanationID )->send();
	}
}