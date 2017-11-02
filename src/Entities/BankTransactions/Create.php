<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts\BankAccountVO;

/**
 * Class Create
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
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
		$oStatement = ( new StatementVO() )
			->addLine( $nTimestamp, $nValue, $sDescription );
		return ( new UploadStatement() )
			->setConnection( $this->getConnection() )
			->setStatement( $oStatement )
			->setBankAccount( $oBankAccountVo )
			->upload();
	}
}