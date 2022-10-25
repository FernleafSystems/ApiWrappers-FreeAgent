<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\BankTransactions;

use FernleafSystems\Utilities\Data\Adapter\DynProperties;

/**
 * @property string[] $lines
 */
class StatementVO {

	use DynProperties;

	/**
	 * @param int    $timestamp
	 * @param double $value
	 * @param string $description
	 * @return $this
	 * @throws \Exception
	 */
	public function addLine( $timestamp, $value, $description ) {

		if ( !is_int( $timestamp ) || $timestamp < 1 ) {
			throw new \Exception( 'The timestamp is not a valid integer.' );
		}
		if ( !preg_match( '#^(-)?[0-9]{1,}(\.[0-9]{1,2})?$#', $value ) ) {
			throw new \Exception( sprintf( 'The value supplied for the CSV line does not appear to be correct: %s', $value ) );
		}
		if ( strpos( $description, ',' ) !== false || strpos( $description, '"' ) !== false ) {
			throw new \Exception( 'The description contains illegal characters: comma(,) or quote(")' );
		}

		$aLines = $this->getLines();
		$aLines[] = sprintf( '%s,%s,%s', gmdate( 'd/m/Y', $timestamp ), $value, $description );
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
	 * @return $this
	 */
	public function setLines( array $lines ) {
		$this->lines = $lines;
		return $this;
	}
}