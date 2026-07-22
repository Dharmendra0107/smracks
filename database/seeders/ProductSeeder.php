<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'slug' => 'heavy-duty-display-rack',
                'name' => 'Heavy Duty Display Rack',
                'desc' => '5-tier shelving, 900mm width, adjustable shelves.',
                'cat' => 'supermarket',
                'cat_label' => 'Supermarket Rack',
                'badge' => 'Best Seller',
                'image' => 'products.png',
                'price' => 4200,
                'old_price' => 4960,
                'specs' => [
                    'Overall Dimensions' => '900mm (W) x 450mm (D) x 1800mm (H)',
                    'Number of Shelves' => '5, fully adjustable',
                    'Load Capacity' => '80kg per shelf / 400kg total',
                    'Frame Material' => 'High-tensile CRCA steel, 1.2mm thickness',
                    'Shelf Material' => 'CRCA steel, 0.8mm thickness',
                    'Finish' => 'Epoxy powder coating, anti-rust',
                    'Color Options' => 'Red/White, Grey, Custom (on request)',
                    'Warranty' => '2 years structural warranty',
                ],
            ],
            [
                'slug' => 'slotted-angle-rack-ms',
                'name' => 'Slotted Angle Rack MS',
                'desc' => '6-shelf bolt-free rack, 200kg/shelf load capacity.',
                'cat' => 'slotted-angle',
                'cat_label' => 'Slotted Angle Rack',
                'badge' => null,
                'image' => 'products2.png',
                'price' => 2850,
                'old_price' => 3360,
                'specs' => [
                    'Overall Dimensions' => '900mm (W) x 450mm (D) x 2000mm (H)',
                    'Number of Shelves' => '6, bolt-free adjustable',
                    'Load Capacity' => '200kg per shelf / 1200kg total',
                    'Frame Material' => 'Mild steel slotted angle, 2mm thickness',
                    'Shelf Material' => 'MS sheet, 0.6mm thickness',
                    'Finish' => 'Powder coated, anti-rust',
                    'Color Options' => 'Blue, Grey, Custom (on request)',
                    'Warranty' => '1 year structural warranty',
                ],
            ],
            [
                'slug' => 'industrial-pallet-rack',
                'name' => 'Industrial Pallet Rack',
                'desc' => 'Heavy-duty warehouse racking, 2000kg/level capacity.',
                'cat' => 'warehouse',
                'cat_label' => 'Warehouse Rack',
                'badge' => 'New',
                'image' => 'products3.png',
                'price' => 9500,
                'old_price' => 11210,
                'specs' => [
                    'Overall Dimensions' => '2700mm (W) x 1100mm (D) x 6000mm (H)',
                    'Number of Levels' => '3, forklift accessible',
                    'Load Capacity' => '2000kg per level / 6000kg total',
                    'Frame Material' => 'High-tensile steel, 3mm thickness',
                    'Beam Material' => 'Cold rolled steel box beams',
                    'Finish' => 'Epoxy powder coating',
                    'Color Options' => 'Orange/Blue, Custom (on request)',
                    'Warranty' => '3 years structural warranty',
                ],
            ],
            [
                'slug' => 'godown-storage-rack',
                'name' => 'Godown Storage Rack',
                'desc' => '4-tier multi-purpose rack for bulk goods storage.',
                'cat' => 'storage',
                'cat_label' => 'Storage Rack',
                'badge' => null,
                'image' => 'products4.png',
                'price' => 5100,
                'old_price' => 6020,
                'specs' => [
                    'Overall Dimensions' => '1200mm (W) x 600mm (D) x 2100mm (H)',
                    'Number of Shelves' => '4, adjustable',
                    'Load Capacity' => '150kg per shelf / 600kg total',
                    'Frame Material' => 'MS angle, 2mm thickness',
                    'Shelf Material' => 'MS sheet, 0.8mm thickness',
                    'Finish' => 'Powder coated, anti-rust',
                    'Color Options' => 'Grey, Custom (on request)',
                    'Warranty' => '1 year structural warranty',
                ],
            ],
            [
                'slug' => 'compact-display-rack',
                'name' => 'Compact Display Rack',
                'desc' => '4-tier shelving, 600mm width, ideal for small stores.',
                'cat' => 'supermarket',
                'cat_label' => 'Supermarket Rack',
                'badge' => null,
                'image' => 'compact.png',
                'price' => 3400,
                'old_price' => 4010,
                'specs' => [
                    'Overall Dimensions' => '600mm (W) x 400mm (D) x 1500mm (H)',
                    'Number of Shelves' => '4, adjustable',
                    'Load Capacity' => '60kg per shelf / 240kg total',
                    'Frame Material' => 'CRCA steel, 1mm thickness',
                    'Shelf Material' => 'CRCA steel, 0.7mm thickness',
                    'Finish' => 'Epoxy powder coating',
                    'Color Options' => 'Red/White, Custom (on request)',
                    'Warranty' => '2 years structural warranty',
                ],
            ],
            [
                'slug' => 'adjustable-storage-rack',
                'name' => 'Adjustable Storage Rack',
                'desc' => '8-shelf tall unit, ideal for offices & godowns.',
                'cat' => 'slotted-angle',
                'cat_label' => 'Slotted Angle Rack',
                'badge' => null,
                'image' => 'adjustable.png',
                'price' => 3950,
                'old_price' => 4660,
                'specs' => [
                    'Overall Dimensions' => '900mm (W) x 450mm (D) x 2400mm (H)',
                    'Number of Shelves' => '8, bolt-free adjustable',
                    'Load Capacity' => '150kg per shelf / 1200kg total',
                    'Frame Material' => 'MS slotted angle, 2mm thickness',
                    'Shelf Material' => 'MS sheet, 0.6mm thickness',
                    'Finish' => 'Powder coated, anti-rust',
                    'Color Options' => 'Blue, Grey, Custom (on request)',
                    'Warranty' => '1 year structural warranty',
                ],
            ],
            [
                'slug' => 'selective-pallet-rack',
                'name' => 'Selective Pallet Rack',
                'desc' => '3-level heavy racking with forklift access aisles.',
                'cat' => 'warehouse',
                'cat_label' => 'Warehouse Rack',
                'badge' => null,
                'image' => 'selective.png',
                'price' => 11200,
                'old_price' => 13220,
                'specs' => [
                    'Overall Dimensions' => '2700mm (W) x 1100mm (D) x 7500mm (H)',
                    'Number of Levels' => '4, forklift accessible',
                    'Load Capacity' => '2200kg per level / 8800kg total',
                    'Frame Material' => 'High-tensile steel, 3mm thickness',
                    'Beam Material' => 'Cold rolled steel box beams',
                    'Finish' => 'Epoxy powder coating',
                    'Color Options' => 'Orange/Blue, Custom (on request)',
                    'Warranty' => '3 years structural warranty',
                ],
            ],
            [
                'slug' => 'cold-storage-rack',
                'name' => 'Cold Storage Rack',
                'desc' => 'Rust-proof coated rack for cold storage units.',
                'cat' => 'storage',
                'cat_label' => 'Storage Rack',
                'badge' => null,
                'image' => 'Popular3.png',
                'price' => 6700,
                'old_price' => 7910,
                'specs' => [
                    'Overall Dimensions' => '1200mm (W) x 600mm (D) x 2100mm (H)',
                    'Number of Shelves' => '5, adjustable',
                    'Load Capacity' => '120kg per shelf / 600kg total',
                    'Frame Material' => 'Galvanized steel, 2mm thickness',
                    'Shelf Material' => 'Galvanized steel, 0.8mm thickness',
                    'Finish' => 'Hot-dip galvanized, rust-proof',
                    'Color Options' => 'Silver (galvanized finish)',
                    'Warranty' => '3 years structural warranty',
                ],
            ],
            [
                'slug' => 'wall-mounted-display-rack',
                'name' => 'Wall Mounted Display Rack',
                'desc' => 'Space-saving wall unit, 3-tier, powder coated finish.',
                'cat' => 'supermarket',
                'cat_label' => 'Supermarket Rack',
                'badge' => 'Popular',
                'image' => 'wallmounted.png',
                'price' => 2600,
                'old_price' => 3070,
                'specs' => [
                    'Overall Dimensions' => '900mm (W) x 300mm (D) x 1200mm (H)',
                    'Number of Shelves' => '3, adjustable',
                    'Load Capacity' => '40kg per shelf / 120kg total',
                    'Frame Material' => 'CRCA steel, 1mm thickness',
                    'Shelf Material' => 'CRCA steel, 0.6mm thickness',
                    'Finish' => 'Epoxy powder coating',
                    'Color Options' => 'White, Custom (on request)',
                    'Warranty' => '2 years structural warranty',
                ],
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product);
        }

        // ---------------------------------------------------------------
        // Real catalog data supplied by the client — priced per running
        // foot (most), per kg (Slotted Angle), or "coming soon" (Heavy
        // Duty). See Product::getDisplayPriceAttribute() for how these
        // render depending on which pricing fields are set.
        //
        // Images below reuse existing placeholder photos from the demo
        // set — swap every `image`/`images` entry for real product
        // photography before this goes live.
        // ---------------------------------------------------------------
        $newProducts = [
            // ---- Display Racks (4 heights) ----
            [
                'slug' => 'display-rack-5ft',
                'name' => 'Display Rack — 5 ft',
                'desc' => 'Height 5 ft, frame size 18×15×12 in (2 panels). Priced per running foot.',
                'cat' => 'display-racks', 'cat_label' => 'Display Rack', 'badge' => null,
                'image' => 'products.png', 'images' => ['products2.png', 'compact.png'],
                'price' => 1700, 'price_unit' => 'Running Ft', 'old_price' => null,
                'specs' => ['Height' => '5 ft', 'Frame Size' => '18×15×12 in (2 panels)', 'Pricing' => '₹1,700 per running foot'],
            ],
            [
                'slug' => 'display-rack-6ft',
                'name' => 'Display Rack — 6 ft',
                'desc' => 'Height 6 ft, frame size 18×15×12 in (3 panels). Priced per running foot.',
                'cat' => 'display-racks', 'cat_label' => 'Display Rack', 'badge' => null,
                'image' => 'products2.png', 'images' => ['products.png', 'wallmounted.png'],
                'price' => 1800, 'price_unit' => 'Running Ft', 'old_price' => null,
                'specs' => ['Height' => '6 ft', 'Frame Size' => '18×15×12 in (3 panels)', 'Pricing' => '₹1,800 per running foot'],
            ],
            [
                'slug' => 'display-rack-7ft',
                'name' => 'Display Rack — 7 ft',
                'desc' => 'Height 7 ft, frame size 18×15×12 in (4 panels). Priced per running foot.',
                'cat' => 'display-racks', 'cat_label' => 'Display Rack', 'badge' => 'Popular',
                'image' => 'compact.png', 'images' => ['products.png', 'products2.png'],
                'price' => 1900, 'price_unit' => 'Running Ft', 'old_price' => null,
                'specs' => ['Height' => '7 ft', 'Frame Size' => '18×15×12 in (4 panels)', 'Pricing' => '₹1,900 per running foot'],
            ],
            [
                'slug' => 'display-rack-8ft',
                'name' => 'Display Rack — 8 ft',
                'desc' => 'Height 8 ft, frame size 18×15×12 in (7 panels). Priced per running foot.',
                'cat' => 'display-racks', 'cat_label' => 'Display Rack', 'badge' => null,
                'image' => 'wallmounted.png', 'images' => ['products.png', 'compact.png'],
                'price' => 2000, 'price_unit' => 'Running Ft', 'old_price' => null,
                'specs' => ['Height' => '8 ft', 'Frame Size' => '18×15×12 in (7 panels)', 'Pricing' => '₹2,000 per running foot'],
            ],

            // ---- Channel Rack (4 heights) ----
            [
                'slug' => 'channel-rack-5ft',
                'name' => 'Channel Rack — 5 ft',
                'desc' => 'Height 5 ft, frame size 15×15×12 in (2 panels). Priced per running foot.',
                'cat' => 'channel-rack', 'cat_label' => 'Channel Rack', 'badge' => null,
                'image' => 'adjustable.png', 'images' => ['selective.png'],
                'price' => 1200, 'price_unit' => 'Running Ft', 'old_price' => null,
                'specs' => ['Height' => '5 ft', 'Frame Size' => '15×15×12 in (2 panels)', 'Pricing' => '₹1,200 per running foot'],
            ],
            [
                'slug' => 'channel-rack-6ft',
                'name' => 'Channel Rack — 6 ft',
                'desc' => 'Height 6 ft, frame size 15×15×12 in (3 panels). Priced per running foot.',
                'cat' => 'channel-rack', 'cat_label' => 'Channel Rack', 'badge' => null,
                'image' => 'selective.png', 'images' => ['adjustable.png'],
                'price' => 1400, 'price_unit' => 'Running Ft', 'old_price' => null,
                'specs' => ['Height' => '6 ft', 'Frame Size' => '15×15×12 in (3 panels)', 'Pricing' => '₹1,400 per running foot'],
            ],
            [
                'slug' => 'channel-rack-7ft',
                'name' => 'Channel Rack — 7 ft',
                'desc' => 'Height 7 ft, frame size 15×15×12 in (4 panels). Priced per running foot.',
                'cat' => 'channel-rack', 'cat_label' => 'Channel Rack', 'badge' => 'Popular',
                'image' => 'products3.png', 'images' => ['adjustable.png', 'selective.png'],
                'price' => 1500, 'price_unit' => 'Running Ft', 'old_price' => null,
                'specs' => ['Height' => '7 ft', 'Frame Size' => '15×15×12 in (4 panels)', 'Pricing' => '₹1,500 per running foot'],
            ],
            [
                'slug' => 'channel-rack-8ft',
                'name' => 'Channel Rack — 8 ft',
                'desc' => 'Height 8 ft, frame size 15×15×12 in (5 panels). Priced per running foot.',
                'cat' => 'channel-rack', 'cat_label' => 'Channel Rack', 'badge' => null,
                'image' => 'products4.png', 'images' => ['adjustable.png'],
                'price' => 1700, 'price_unit' => 'Running Ft', 'old_price' => null,
                'specs' => ['Height' => '8 ft', 'Frame Size' => '15×15×12 in (5 panels)', 'Pricing' => '₹1,700 per running foot'],
            ],

            // ---- Slotted Angle Racks (real entry — price range per kg) ----
            [
                'slug' => 'slotted-angle-rack-custom',
                'name' => 'Slotted Angle Rack — Custom Size',
                'desc' => 'Available in 2 ft to 10 ft sizes, built to your exact requirement.',
                'cat' => 'slotted-angle', 'cat_label' => 'Slotted Angle Rack', 'badge' => null,
                'image' => 'slotted.png', 'images' => ['adjustable.png'],
                'price' => null, 'price_unit' => null, 'old_price' => null,
                'price_note' => '₹130 – ₹150 per kg',
                'specs' => ['Available Sizes' => '2 ft to 10 ft', 'Pricing' => '₹130 to ₹150 per kg, depending on size'],
            ],

            // ---- Heavy Duty Racks (real entry — price coming soon) ----
            [
                'slug' => 'heavy-duty-rack-standard',
                'name' => 'Heavy Duty Rack',
                'desc' => 'High load-bearing racks engineered for machinery & bulk material storage.',
                'cat' => 'heavy-duty', 'cat_label' => 'Heavy Duty Rack', 'badge' => 'New',
                'image' => 'heavy-duty.png', 'images' => [],
                'price' => null, 'price_unit' => null, 'old_price' => null,
                'price_note' => 'Coming Soon',
                'specs' => ['Status' => 'Pricing to be announced — contact us for early inquiries'],
            ],

            // ---- Both Side Racks ----
            [
                'slug' => 'both-side-rack-5ft',
                'name' => 'Both Side Rack — 5 ft',
                'desc' => 'Height 5 ft, frame size 18×15×12 in (3 panels). Accessible from both sides.',
                'cat' => 'both-side-racks', 'cat_label' => 'Both Side Rack', 'badge' => null,
                'image' => 'warehouse.png', 'images' => ['products3.png'],
                'price' => 2600, 'price_unit' => 'Running Ft', 'old_price' => null,
                'specs' => ['Height' => '5 ft', 'Frame Size' => '18×15×12 in (3 panels)', 'Access' => 'Both sides', 'Pricing' => '₹2,600 per running foot'],
            ],
        ];

        foreach ($newProducts as $product) {
            Product::updateOrCreate(['slug' => $product['slug']], $product);
        }
    }
}