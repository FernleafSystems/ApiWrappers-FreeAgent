<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccounts\BankAccountVO;

/**
 * Class Upload
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 */
class UploadStatement extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		$sStatement = $this->getStatement();
		if ( empty( $sStatement ) ) {
			throw new \Exception( 'Attempting to upload an empty statement' );
		}

		$aQuery = $this->getRequestQueryData();
		if ( empty( $aQuery[ 'bank_account' ] ) ) {
			throw new \Exception( 'Attempting to upload a statement without a bank account specified' );
		}
	}

	/**
	 * @return bool
	 */
	public function upload() {
		return $this->send()
					->isLastRequestSuccess();
	}

	/**
	 * @return string
	 */
	protected function getDataPackageKey() {
		return 'statement';
	}

	/**
	 * @return string
	 */
	protected function getStatement() {
		return $this->getStringParam( 'statement' );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return 'bank_transactions/statement';
	}

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return $this
	 */
	public function setBankAccount( $oBankAccount ) {
		return $this->setRequestQueryDataItem( 'bank_account', $oBankAccount->getUri() );
	}

	/**
	 * @param StatementVO $oStatement
	 * @return $this
	 */
	public function setStatement( $oStatement ) {
		return $this->setRequestDataItem( 'statement', $oStatement->getLinesAsString() );
	}
}