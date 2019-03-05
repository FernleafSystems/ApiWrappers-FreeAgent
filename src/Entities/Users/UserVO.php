<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/users
 *
 * Class UserVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 */
class UserVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->getStringParam( 'email' );
	}

	/**
	 * @return string
	 */
	public function getFirstName() {
		return $this->getStringParam( 'first_name' );
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->getStringParam( 'last_name' );
	}

	/**
	 * @return string National Insurance Number
	 */
	public function getNiNumber() {
		return $this->getStringParam( 'unique_tax_reference' );
	}

	/**
	 * @return string
	 */
	public function getUniqueTaxReference() {
		return $this->getStringParam( 'unique_tax_reference' );
	}

	/**
	 * @return string
	 */
	public function getPermissionLevel() {
		return $this->getNumericParam( 'permission_level' );
	}

	/**
	 * @return string
	 */
	public function getPermissionLevelAsString() {
		return $this->getPermissionsMap()[ $this->getPermissionLevel() ];
	}

	/**
	 * @return string
	 */
	public function getRole() {
		return $this->getStringParam( 'role' );
	}

	/**
	 * @return array
	 */
	protected function getPermissionsMap() {
		return [
			'No Access',
			'Time',
			'My Money',
			'Contacts & Projects',
			'Invoices, Estimates & Files',
			'Bills',
			'Banking',
			'Tax, Accounting & Users',
			'Full',
		];
	}
}