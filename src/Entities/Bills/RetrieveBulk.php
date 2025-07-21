<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\RetrieveBulkBase;

class RetrieveBulk extends RetrieveBulkBase {

	use BillsTrait;

	public function filterByContactID( int $id ) :self {
		return $this->setRequestDataItem( 'contact', $this->getConnection()->getBaseUrl().'/contacts/'.$id );
	}
}