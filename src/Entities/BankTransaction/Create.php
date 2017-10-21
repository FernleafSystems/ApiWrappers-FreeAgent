<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction
 */
class Create extends Base {

	/**
	 * @param BankAccountVO $oBankAccountVo
	 * @param int           $nTimestamp
	 * @param double        $nValue
	 * @param string        $sDescription
	 * @return bool
	 */
	public function create( $oBankAccountVo, $nTimestamp, $nValue, $sDescription ) {
		return ( new Upload() )->setFreeagentApi( $this->getFreeagentApi() )
							   ->addStatementLine_Csv( $nTimestamp, $nValue, $sDescription )
							   ->upload( $oBankAccountVo );
	}
}