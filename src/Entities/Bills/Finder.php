<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

/**
 * Class Finder
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Finder extends BillsIterator {

	/**
	 * @param string $sReference
	 * @param bool   $bCaseInsensitive
	 * @return BillVO|null
	 */
	public function findByReference( $sReference, $bCaseInsensitive = true ) {
		$oTheBill = null;
		foreach ( $this as $oBill ) {
			if ( ( $bCaseInsensitive && strcasecmp( $oBill->reference, $sReference ) )
				 || ( !$bCaseInsensitive && $oBill->reference === $sReference ) ) {
				$oTheBill = $oBill;
				break;
			}
		}
		return $oTheBill;
	}
}