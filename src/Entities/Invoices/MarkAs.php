<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

use FernleafSystems\ApiWrappers\Freeagent\Api;

/**
 * TODO
 * Class MarkAs
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class MarkAs extends Api {

	/**
	 * @param string $nId
	 * @return bool
	 */
	public function cancelled( $nId ) {
		return $this->markAs( $nId, 'cancelled' );
	}

	/**
	 * @param string $nId
	 * @return bool
	 */
	public function draft( $nId ) {
		return $this->markAs( $nId, 'draft' );
	}

	/**
	 * @param string $nId
	 * @return bool
	 */
	public function scheduled( $nId ) {
		return $this->markAs( $nId, 'scheduled' );
	}

	/**
	 * @param string $nId
	 * @return bool
	 */
	public function sent( $nId ) {
		return $this->markAs( $nId, 'sent' );
	}

	/**
	 * @param string $nId
	 * @param string $aAs
	 * @return bool
	 */
	protected function markAs( $nId, $aAs ) {
		$oResult = $this->getFreeagentApi()
						->updateInvoiceAs( $nId, $aAs );
		return $oResult->success;
	}
}