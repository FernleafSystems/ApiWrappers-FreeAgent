<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills;

/**
 * Class Finder
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Bills
 */
class Finder extends BillsIterator {

	/**
	 * @param string $sRef
	 * @param bool   $bCaseInsensitive
	 * @return BillVO|null
	 */
	public function findByReference( $sRef, $bCaseInsensitive = true ) {
		$oTheOne = null;
		foreach ( $this as $oBill ) {
			if ( ( $bCaseInsensitive && strcasecmp( $oBill->reference, $sRef ) === 0 )
				 || ( !$bCaseInsensitive && $oBill->reference === $sRef ) ) {
				$oTheOne = $oBill;
				break;
			}
		}
		return $oTheOne;
	}
}