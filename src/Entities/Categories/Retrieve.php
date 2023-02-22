<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Categories;

class Retrieve extends Base {

	public function exists() :bool {
		return $this->retrieve() !== null;
	}

	public function retrieve() :?CategoryVO {
		return $this->sendRequestWithVoResponse();
	}

	public function sendRequestWithVoResponse() :?CategoryVO {
		try {
			$data = $this->send()->getCoreResponseData();
		}
		catch ( \Exception $e ) {
		}

		$VO = null;
		if ( !empty( $data ) && is_array( $data ) ) {
			foreach ( $data as $sCatType => $aCategory ) {
				if ( $aCategory[ 'nominal_code' ] == $this->entity_id ) {
					$VO = $this->getVO()->applyFromArray( $aCategory );
				}
			}
		}
		return $VO;
	}

	protected function getResponseDataPayloadKey() :string {
		return '';
	}

	public function setEntityId( $id ) :self {
		$this->entity_id = str_pad( $id, 3, '0', STR_PAD_LEFT );
		return $this;
	}

	protected function preSendVerification() {
		parent::preSendVerification();
		if ( !$this->hasEntityId() ) {
			throw new \Exception( 'Attempting to make "retrieve" API request without an Entity ID' );
		}
	}
}