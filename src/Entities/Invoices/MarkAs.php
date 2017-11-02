<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices;

/**
 * Class MarkAs
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices
 */
class MarkAs extends Base {

	const REQUEST_METHOD = 'put';

	/**
	 * @return bool
	 */
	public function cancelled() {
		return $this->markAs( 'cancelled' );
	}

	/**
	 * @return bool
	 */
	public function draft() {
		return $this->markAs( 'draft' );
	}

	/**
	 * @return bool
	 */
	public function scheduled() {
		return $this->markAs( 'scheduled' );
	}

	/**
	 * @return bool
	 */
	public function sent() {
		return $this->markAs( 'sent' );
	}

	/**
	 * @param string $sAs
	 * @return bool
	 */
	protected function markAs( $sAs ) {
		return $this->setParam( 'mark_as', strtolower( $sAs ) )
					->send()
					->isLastRequestSuccess();
	}

	/**
	 * @return string
	 */
	protected function getUrlEndpoint() {
		return sprintf( 'invoices/%s/transitions/mark_as_%s',
			$this->getEntityId(), $this->getParam( 'mark_as' )
		);
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