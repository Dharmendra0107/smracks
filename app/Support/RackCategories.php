<?php

namespace App\Support;

/**
 * Single source of truth for rack category slugs/names/icons.
 * Used by ProductController (product listing filters) and
 * NavbarComposer (the navbar's Categories dropdown) so the two
 * never drift out of sync with each other.
 */
class RackCategories
{
    public static function names(): array
    {
        return [
            'supermarket'     => 'Supermarket Racks',
            'slotted-angle'   => 'Slotted Angle Racks',
            'warehouse'       => 'Warehouse Racks',
            'storage'         => 'Storage Racks',
            'heavy-duty'      => 'Heavy Duty Racks',
            'boltless'        => 'Boltless Racks',
            'cold-storage'    => 'Cold Storage Racks',
            'office'          => 'Office & Home Racks',
            'display-racks'   => 'Display Racks',
            'channel-rack'    => 'Channel Rack',
            'both-side-racks' => 'Both Side Racks',
        ];
    }

    public static function descriptions(): array
    {
        return [
            'supermarket'     => 'Display shelving for retail stores, grocery outlets & showrooms — adjustable, powder coated, ready to ship.',
            'slotted-angle'   => 'Bolt-free, adjustable slotted angle racks for offices, homes, godowns & light storage needs.',
            'warehouse'       => 'Heavy-duty pallet & industrial racking built for bulk storage, 3PL facilities & distribution centers.',
            'storage'         => 'Multi-purpose storage racks for godowns, factories & cold storage units — built to last.',
            'heavy-duty'      => 'High load-bearing racks engineered for machinery & bulk material storage.',
            'boltless'        => 'Tool-free, modular racks built for quick assembly & relocation.',
            'cold-storage'    => 'Rust-proof coated racks purpose-built for cold rooms & food storage.',
            'office'          => 'Compact, tidy storage solutions for offices, records rooms & homes.',
            'display-racks'   => 'Panel-mounted display racks in multiple heights — priced per running foot, built for retail floors.',
            'channel-rack'    => 'Channel-frame racking available in multiple heights and panel counts, priced per running foot.',
            'both-side-racks' => 'Double-sided racks for aisle setups — accessible from both faces, maximizing floor space.',
        ];
    }

    /** Small FontAwesome icon per category, used in the navbar dropdown. */
    public static function icons(): array
    {
        return [
            'supermarket'     => 'fa-store',
            'slotted-angle'   => 'fa-layer-group',
            'warehouse'       => 'fa-warehouse',
            'storage'         => 'fa-boxes-stacked',
            'heavy-duty'      => 'fa-weight-hanging',
            'boltless'        => 'fa-cubes',
            'cold-storage'    => 'fa-snowflake',
            'office'          => 'fa-building',
            'display-racks'   => 'fa-table-cells',
            'channel-rack'    => 'fa-grip-lines',
            'both-side-racks' => 'fa-arrows-left-right',
        ];
    }

    /** Categories that don't have seeded stock yet (used by ProductController for the empty-state). */
    public static function withoutStock(): array
    {
        return ['boltless', 'cold-storage', 'office'];
    }
}