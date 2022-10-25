<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

trait BillsTrait {

	protected function getApiEndpoint() :string {
		return 'bills';
	}

	public function getVO() :BillVO{
		return new BillVO();
	}
}