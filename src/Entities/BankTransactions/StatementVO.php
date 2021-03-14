<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
 * Class StatementVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions
 * @property array $lines
 */
class StatementVO {

	use DynProperties;

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

	public function getLines() :array {
		return is_array( $this->lines ) ? $this->lines : [];
	}

	public function getLinesAsString() :string {
		return implode( "\n", $this->getLines() );
	}

	public function hasLines() :bool {
		return count( $this->getLines() ) > 0;
	}

	/**
	 * @param array $lines
	 * @return $this
	 */
	public function setLines( $lines ) {
		$this->lines = $lines;
		return $this;
	}
}