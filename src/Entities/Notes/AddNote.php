<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Notes;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\ContactVO;

class AddNote extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @return $this
	 * @throws \Exception
	 */
	public function add() {
		return $this->send();
	}

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
	 * @param ContactVO $contact
	 * @return $this
	 */
	public function setContact( $contact ) {
		return $this->setRequestQueryDataItem( 'contact', $contact->url );
	}

	/**
	 * @param bool     $bPrefixTimestamp
	 * @param string[] $aNoteLines
	 * @return $this
	 */
	public function setNoteLines( $aNoteLines, $bPrefixTimestamp = true ) {

		if ( empty( $aNoteLines ) ) {
			$aNoteLines = [];
		}
		elseif ( !is_array( $aNoteLines ) ) {
			$aNoteLines = [ $aNoteLines ];
		}

		if ( $bPrefixTimestamp ) {
			array_unshift( $aNoteLines, sprintf( 'Date: %s', gmdate( 'Y-m-d H:i:s' ) ) );
		}
		return $this->setRequestDataItem( 'note', implode( "\n", $aNoteLines ) );
	}
}