<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction;

use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;

/**
 * Class Upload
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction
 */
class UploadStatement extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		$oStatement = $this->getStatement();
		if ( !( $oStatement instanceof StatementVO ) ) {
			throw new \Exception( 'Attempting to make upload a statement without a valid Statement object' );
		}
		if ( !$oStatement->hasLines() ) {
			throw new \Exception( 'Attempting to make upload an empty statement' );
		}

		$aQuery = $this->getRequestQueryData();
		if ( empty( $aQuery[ 'bank_account' ] ) ) {
			throw new \Exception( 'Attempting to upload an empty statement without a bank account specified' );
		}
	}

	/**
	 * @return bool
	 */
	public function upload() {
		return $this->setRequestDataItem( 'statement', $this->getStatement()->getLinesAsString() )
					->send()
					->isLastRequestSuccess();
	}

	/**
	 * @return string
	 */
	protected function getDataPackageKey() {
		return 'statement';
	}

	/**
	 * @return StatementVO
	 */
	protected function getStatement() {
		return $this->getParam( 'statement' );
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'bank_transactions/statement', $this->getEntityId() );
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
		return $this->setParam( 'statement', $oStatement );
	}
}