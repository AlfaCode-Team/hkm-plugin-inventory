# Port status — `inventory.stock`

**Nothing is ported yet. This plugin is a scaffold.**

It declares its domain, its dependencies and an empty published
contract, so a consumer can already name `inventory.stock` in its
`requires[]` and the boot will accept it. It cannot yet *do* anything:
`Provider::register()` binds no service, and `InventoryServiceContract` has no
methods, so resolving it from a module container throws.

## What has to be ported

| | |
|---|---|
| Legacy source | `stocks/ (20 pages), stocks/_stock_lib.php, stocks/api/` |
| Legacy tables | `stock_items, stock_batches, stock_movements, stock_requisitions, stock_rooms, stock_suppliers, stock_incidents, stock_handovers, stock_edits, stock_kit_columns, stock_signature_requests` |

Those tables are part of the ~50 that have **no DDL anywhere** in the
legacy tree — it was built by hand against a live database. The schema
has to be reconstructed from the queries that read it before any
repository here can be written. That protocol is PORT-PLAN.md §8.

## Order of work

1. Reconstruct the tables above into `database/migrations/` (LetMigrate).
2. Transcribe the pure algorithms from the legacy source into `Domain/`.
3. Add ONE method to `InventoryServiceContract` per use case the outside world needs.
4. Implement it in `Application/Services/`, reading through a repository
   bound with `bindInternal()`.
5. Declare routes in `module.json` — never in PHP.
6. Bind the contract in `Provider::register()`.

Each step is gated: a method is not ported until a test covers it.

## Depends on

- `database.management`
- `audit.trail`

These are module **domains**. An unknown domain fails the boot.

## The plan this follows

`PORT-PLAN.md` (phases, invariants, schema protocol) and
`PLUGIN-PLAN.md` (the 29-plugin split) in the **ElimuSystem**
repository. Not public.
