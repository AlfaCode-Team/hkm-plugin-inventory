<?php

declare(strict_types=1);

namespace Plugins\Inventory\API\Contracts;

/**
 * Published contract for `inventory.stock`.
 *
 * Stock items, batches, movements, rooms, suppliers, requisitions, incidents and signed handovers.
 *
 * Legacy source : stocks/ (20 pages), stocks/_stock_lib.php, stocks/api/
 * Legacy tables : stock_items, stock_batches, stock_movements, stock_requisitions, stock_rooms, stock_suppliers, stock_incidents, stock_handovers, stock_edits, stock_kit_columns, stock_signature_requests
 *
 * Consumers declare `"requires": ["inventory.stock"]` and resolve THIS interface.
 * Nothing outside this plugin may touch its internals — those are bound with
 * `bindInternal()` and throw `ScopeViolationException` cross-scope.
 *
 * @see docs/PORT.md in this repository for what still has to be ported.
 */
interface InventoryServiceContract
{
    // Methods are added as each legacy use case is ported. Keep this surface
    // minimal: one method per use case the OUTSIDE world needs, never a
    // pass-through to a repository.
}
