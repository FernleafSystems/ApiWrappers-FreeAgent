<?php

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\Items;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Common\EntityVO;

/**
 * https://dev.freeagent.com/docs/bills
 * @property string $bill                   - URL
 * @property string $category               - URL
 * @property string $description
 * @property float  $total_value
 * @property float  $sales_tax_rate
 * @property float  $sales_tax_status       - 1 of TAXABLE, EXEMPT or OUT_OF_SCOPE
 * @property float  $second_sales_tax_rate
 * @property string $unit
 * @property float  $quantity
 * @property string $stock_item             - URL
 * @property string $project
 */
class BillItemVO extends EntityVO {

	const TAX_STATUS_TAXABLE = 'TAXABLE';
	const TAX_STATUS_EXEMPT = 'EXEMPT';
	const TAX_STATUS_OUTOFSCOPE = 'OUT_OF_SCOPE';
}