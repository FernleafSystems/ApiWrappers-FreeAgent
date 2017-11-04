<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Categories;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * Class CategoryVO
 * @package FernleafSystems\ApiWrappers\Freeagent\Entities\Categories
 */
class CategoryVO extends EntityVO {

	/**
	 * @return string
	 */
	public function getId() {
		return $this->getNominalCode();
	}

	/**
	 * The category name
	 * @return string
	 */
	public function getDescription() {
		return $this->getStringParam( 'description' );
	}

	/**
	 * @return string
	 */
	public function getNominalCode() {
		return $this->getStringParam( 'nominal_code' );
	}

	/**
	 * @return bool
	 */
	public function isCategoryIncome() {
		return ( (int)$this->getNominalCode() <= 49 );
	}

	/**
	 * @return bool
	 */
	public function isCategoryCostOfSales() {
		$nCode = (int)$this->getNominalCode();
		return ( $nCode >= 100 && $nCode <= 199 );
	}

	/**
	 * @return bool
	 */
	public function isCategoryAdminExpenses() {
		$nCode = (int)$this->getNominalCode();
		return ( $nCode >= 200 && $nCode <= 399 );
	}
}