# hkm-plugin-inventory

> Solves **`inventory.stock`** · namespace **`Plugins\Inventory\`** · on-demand GDA module
> Family: Generic — reusable beyond Elimu

Stock items, batches, movements, rooms, suppliers, requisitions, incidents and signed handovers.

## Status

**Scaffold.** The domain is declared and the contract is published, but no use
case is implemented yet. `InventoryServiceContract` is deliberately empty — methods are added
one per ported use case.

## Where it comes from

| | |
|---|---|
| Legacy source | `stocks/ (20 pages), stocks/_stock_lib.php, stocks/api/` |
| Legacy tables | `stock_items, stock_batches, stock_movements, stock_requisitions, stock_rooms, stock_suppliers, stock_incidents, stock_handovers, stock_edits, stock_kit_columns, stock_signature_requests` |

The port plan, the reconstructed domain model and the per-plugin recipe live in
the **ElimuSystem** repository: `PORT-PLAN.md` and `PLUGIN-PLAN.md`.

## Requires

- `database.management`
- `audit.trail`

Declared as module **domains**, never port or contract class names. An unknown
domain fails the boot.

## Using it

```jsonc
// the consumer's module.json / proj.json
{ "requires": ["inventory.stock"] }
```

```php
$svc = $container->make(\Plugins\Inventory\API\Contracts\InventoryServiceContract::class);
```

## Installing

```bash
hkm plugins enable Inventory <project>
```
