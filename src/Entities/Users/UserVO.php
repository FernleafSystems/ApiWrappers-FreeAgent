<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Users;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/users
 *
 * Class UserVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Users
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $ni_number
 * @property string $unique_tax_reference
 * @property int    $permission_level
 * @property string $role
 */
class UserVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getPermissionLevelAsString() {
		return $this->getPermissionsMap()[ $this->permission_level ];
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

	/**
	 * @return string
	 * @deprecated
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getFirstName() {
		return $this->first_name;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getLastName() {
		return $this->last_name;
	}

	/**
	 * @return string National Insurance Number
	 * @deprecated
	 */
	public function getNiNumber() {
		return $this->ni_number;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getUniqueTaxReference() {
		return $this->unique_tax_reference;
	}

	/**
	 * @return int
	 * @deprecated
	 */
	public function getPermissionLevel() {
		return (int)$this->permission_level;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getRole() {
		return $this->role;
	}
}