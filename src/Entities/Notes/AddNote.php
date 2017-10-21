<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Notes;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

/**
 * Class AddNote
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Notes
 */
class AddNote extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		$sNote = $this->getRequestDataItem( 'note' );
		if ( empty( $sNote ) ) {
			throw new \Exception( 'Attempting to create a note with not Note data' );
		}
	}

	/**
	 * @param ContactVO $oContact
	 * @return $this
	 */
	public function setContact( $oContact ) {
		return $this->setRequestQueryDataItem( 'contact', $oContact->getUri() );
	}

	/**
	 * @param string[] $aNoteLines
	 * @return $this
	 */
	public function setNoteLines( $aNoteLines ) {

		if ( empty( $aNoteLines ) ) {
			$aNoteLines = [];
		}
		else if ( !is_array( $aNoteLines ) ) {
			$aNoteLines = [ $aNoteLines ];
		}

		array_unshift( $aNoteLines,
			sprintf( 'Date: %s', gmdate( 'Y-m-d H:i:s' ) )
		);
		return $this->setRequestDataItem( 'note', implode( "\n", $aNoteLines ) );
	}
}