<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Categories;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class CategoryVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Categories
 * @property string $description - category name
 * @property string $nominal_code
 * @property string $
 */
class CategoryVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getId() {
		return $this->nominal_code;
	}

	/**
	 * @return bool
	 */
	public function isCategoryIncome() {
		return ( (int)$this->nominal_code <= 49 );
	}

	/**
	 * @return bool
	 */
	public function isCategoryCostOfSales() {
		$nCode = (int)$this->nominal_code;
		return ( $nCode >= 100 && $nCode <= 199 );
	}

	/**
	 * @return bool
	 */
	public function isCategoryAdminExpenses() {
		$nCode = (int)$this->nominal_code;
		return ( $nCode >= 200 && $nCode <= 399 );
	}

	/**
	 * The category name
	 * @return string
	 * @deprecated
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @return string
	 * @deprecated
	 */
	public function getNominalCode() {
		return $this->nominal_code;
	}
}