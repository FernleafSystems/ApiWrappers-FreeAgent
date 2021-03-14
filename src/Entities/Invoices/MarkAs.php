<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Class MarkAs
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 * @property string $mark_as
 */
class MarkAs extends Base {

	const REQUEST_METHOD = 'put';

	public function cancelled() :bool {
		return $this->markAs( 'cancelled' );
	}

	public function draft() :bool {
		return $this->markAs( 'draft' );
	}

	public function scheduled() :bool {
		return $this->markAs( 'scheduled' );
	}

	public function sent() :bool {
		return $this->markAs( 'sent' );
	}

	protected function markAs( string $as ) :bool {
		try {
			$this->mark_as = strtolower( $as );
			$success = $this->send()->isLastRequestSuccess();
		}
		catch ( \Exception $e ) {
			$success = false;
		}
		return $success;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( 'invoices/%s/transitions/mark_as_%s', $this->entity_id, $this->mark_as );
	}

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();
		if ( !$this->hasEntityId() ) {
			throw new \Exception( 'Attempting to make an API request without an Entity ID' );
		}
	}
}