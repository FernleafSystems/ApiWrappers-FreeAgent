<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction;

use FernleafSystems\Utilities\Data\Adapter\StdClassAdapter;

/**
 * Class StatementVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransaction
 */
class StatementVO {

	use StdClassAdapter;

	/**
	 * @param int    $nTimestamp
	 * @param double $nValue
	 * @param string $sDescription
	 * @return $this
	 * @throws \Exception
	 */
	public function addLine( $nTimestamp, $nValue, $sDescription ) {

		if ( !is_int( $nTimestamp ) || $nTimestamp < 1 ) {
			throw new \Exception( 'The timestamp is not a valid integer.' );
		}
		if ( !preg_match( '#^(-)?[0-9]{1,}(\.[0-9]{1,2})?$#', $nValue ) ) {
			throw new \Exception( sprintf( 'The value supplied for the CSV line does not appear to be correct: %s', $nValue ) );
		}
		if ( strpos( $sDescription, ',' ) !== false || strpos( $sDescription, '"' ) !== false ) {
			throw new \Exception( 'The description contains illegal characters: comma(,) or quote(")' );
		}

		$aLines = $this->getLines();
		$aLines[] = sprintf( '%s,%s,%s', gmdate( 'd/m/Y', $nTimestamp ), $nValue, $sDescription );
		return $this->setLines( $aLines );
	}

	/**
	 * @return array
	 */
	public function getLines() {
		return $this->getArrayParam( 'lines' );
	}

	/**
	 * @return string
	 */
	public function getLinesAsString() {
		return implode( "\n", $this->getLines() );
	}

	/**
	 * @return bool
	 */
	public function hasLines() {
		return count( $this->getLines() ) > 0;
	}

	/**
	 * @param array $aLines
	 * @return $this
	 */
	public function setLines( $aLines ) {
		return $this->setParam( 'lines', $aLines );
	}
}