<?php declare(strict_types=1);

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

class Delete extends Base {

	public const REQUEST_METHOD = 'delete';

	public function delete( int $billID = 0 ) :self {
		if ( $billID > 0 ) {
			$this->setEntityId( $billID );
            $this->send();
		}
		return $this;
	}
}