<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Freeagent\Entities\RecurringInvoices;

use FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\InvoiceVO;

/**
 * https://dev.freeagent.com/docs/recurring_invoices
 * @property string $frequency
 *          - Weekly, Two Weekly,Four Weekly, Monthly, Two Monthly, Quarterly, Biannually, Annually, 2-Yearly
 * @property string $recurring_status   - Draft, Active
 * @property string $recurring_end_date - Blank if recurring forever
 * @property string $next_recurs_on
 */
class RecurringInvoiceVO extends InvoiceVO {

}