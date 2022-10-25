<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

class Create extends Base {

	const REQUEST_METHOD = 'post';

	/**
	 * @throws \Exception
	 */
	protected function preSendVerification() {
		parent::preSendVerification();

		$sRole = $this->getRequestDataItem( 'role' );
		if ( !in_array( $sRole, $this->getPossibleRoles() ) ) {
			throw new \Exception( sprintf( 'Role provided "%s" is not one of the supported User Roles.', $sRole ) );
		}

		$nPermissionLevel = $this->getRequestDataItem( 'permission_level' );
		if ( $nPermissionLevel < 0 || $nPermissionLevel > 8 ) {
			throw new \Exception( sprintf( 'Permission Level "%s" is not between 0 and 8.', $nPermissionLevel ) );
		}
	}

	/**
	 * @param array $aData
	 * @return UserVO|null
	 */
	public function create( $aData = [] ) {
		return $this->setRequestData( $aData, true )
					->sendRequestWithVoResponse();
	}

	/**
	 * @param string $sEmail
	 * @return $this
	 */
	public function setEmail( $sEmail ) {
		return $this->setRequestDataItem( 'email', $sEmail );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setFirstName( $sName ) {
		return $this->setRequestDataItem( 'first_name', $sName );
	}

	/**
	 * @param string $sName
	 * @return $this
	 */
	public function setLastName( $sName ) {
		return $this->setRequestDataItem( 'last_name', $sName );
	}

	/**
	 * @param int $nLevel 0-8
	 * @return $this
	 */
	public function setPermissionLevel( $nLevel ) {
		return $this->setRequestDataItem( 'permission_level', (int)$nLevel );
	}

	/**
	 * @param string $sRole Owner, Director, Partner, Company Secretary, Employee, Shareholder, Accountant
	 * @return $this
	 */
	public function setRole( $sRole ) {
		return $this->setRequestDataItem( 'role', ucwords( strtolower( $sRole ) ) );
	}

	/**
	 * @return array
	 */
	protected function getPossibleRoles() {
		return [ 'Owner', 'Director', 'Partner', 'Company Secretary', 'Employee', 'Shareholder', 'Accountant' ];
	}
}