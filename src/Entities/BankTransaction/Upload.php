<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction;

use FernleafSystems\ApiWrappers\Freeagent\Api;
use FernleafSystems\ApiWrappers\Freeagent\Entities\BankAccount\BankAccountVO;

/**
 * Class Upload
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction
 */
class Upload extends Api {

	/**
	 * @var array
	 */
	private $aStatementLines;

	/**
	 * @param BankAccountVO $oBankAccount
	 * @return bool
	 */
	public function upload( $oBankAccount ) {

		$bSuccess = false;
		if ( $this->hasLines() ) {
			$oResult = $this->getFreeagentApi()
							->uploadBankStatement( $oBankAccount->getUri(), implode( "\n", $this->getStatementLines() ) );
			$bSuccess = $oResult->success;
		}
		return $bSuccess;
	}

	/**
	 * @param int    $nTimestamp
	 * @param double $nValue
	 * @param string $sDescription
	 * @return $this
	 * @throws \Exception
	 */
	public function addStatementLine_Csv( $nTimestamp, $nValue, $sDescription ) {

		if ( !is_int( $nTimestamp ) ) {
			throw new \Exception( 'The timestamp is not a valid integer.' );
		}
		if ( !preg_match( '#^(-)?[0-9]{1,}(\.[0-9]{1,2})?$#', $nValue ) ) {
			throw new \Exception( sprintf( 'The value supplied for the CSV line does not appear to be correct: %s', $nValue ) );
		}
		if ( strpos( $sDescription, ',' ) !== false || strpos( $sDescription, '"' ) !== false ) {
			throw new \Exception( 'The description contains illegal characters: comma(,) or quote(")' );
		}

		$aLines = $this->getStatementLines();
		$aLines[] = sprintf( '%s,%s,%s', gmdate( 'd/m/Y', $nTimestamp ), $nValue, $sDescription );
		return $this->setStatementLines( $aLines );
	}

	/**
	 * @return array
	 */
	public function getStatementLines() {
		if ( !isset( $this->aStatementLines ) ) {
			$this->aStatementLines = array();
		}
		return $this->aStatementLines;
	}

	/**
	 * @return bool
	 */
	public function hasLines() {
		return !empty( $this->getStatementLines() );
	}

	/**
	 * @param array $aLines
	 * @return $this
	 */
	public function setStatementLines( $aLines ) {
		$this->aStatementLines = $aLines;
		return $this;
	}
}