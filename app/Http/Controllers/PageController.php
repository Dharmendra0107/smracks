<?php

namespace App\Http\Controllers;

use App\Mail\QuoteConfirmationMail;
use App\Mail\QuoteRequestMail;
use App\Models\Product;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class PageController extends Controller
{
    public function useCases()
    {
        $scenarios = [
            ['cat' => 'supermarket', 'icon' => 'fa-cart-shopping', 'tag' => 'Retail & Grocery', 'title' => 'Supermarkets & Grocery Stores', 'desc' => 'Aisle shelving that displays products at eye level and holds up to daily restocking.', 'recommend' => 'Supermarket Display Racks', 'image' => 'supermarket.png'],
            ['cat' => 'warehouse', 'icon' => 'fa-warehouse', 'tag' => 'Logistics', 'title' => 'Warehouses & Distribution Centers', 'desc' => 'Heavy-duty pallet racking built for forklift access and bulk stock rotation.', 'recommend' => 'Warehouse Pallet Racks', 'image' => 'warehouse.png'],
            ['cat' => 'cold-storage', 'icon' => 'fa-snowflake', 'tag' => 'Cold Chain', 'title' => 'Cold Storage & Food Units', 'desc' => 'Rust-proof coated racks built to hold up in cold rooms and high-humidity spaces.', 'recommend' => 'Cold Storage Racks', 'image' => 'cold-storage.png'],
            ['cat' => 'office', 'icon' => 'fa-building', 'tag' => 'Office', 'title' => 'Offices & Records Rooms', 'desc' => 'Compact, tidy shelving for files, stationery, and general office storage.', 'recommend' => 'Office & Home Racks', 'image' => 'office.png'],
            ['cat' => 'supermarket', 'icon' => 'fa-briefcase-medical', 'tag' => 'Pharmacy', 'title' => 'Pharmacies & Medical Stores', 'desc' => 'Compartmentalized display shelving for organized, easy-to-browse medicine racks.', 'recommend' => 'Supermarket Display Racks', 'image' => 'compact.png'],
            ['cat' => 'slotted-angle', 'icon' => 'fa-house', 'tag' => 'Home', 'title' => 'Homes & Personal Storage', 'desc' => 'Easy-assembly, bolt-free racks for garages, store rooms, and home organization.', 'recommend' => 'Slotted Angle Racks', 'image' => 'slotted.png'],
            ['cat' => 'heavy-duty', 'icon' => 'fa-industry', 'tag' => 'Manufacturing', 'title' => 'Factories & Manufacturing Units', 'desc' => 'High load-bearing racks for raw material, tools, and finished goods storage.', 'recommend' => 'Heavy Duty Racks', 'image' => 'heavy-duty.png'],
            ['cat' => 'boltless', 'icon' => 'fa-truck-fast', 'tag' => 'E-Commerce', 'title' => 'Fulfilment & Packing Centers', 'desc' => 'Modular, quick-to-assemble racks that scale up fast as order volume grows.', 'recommend' => 'Boltless Racks', 'image' => 'boltless.png'],
            ['cat' => 'storage', 'icon' => 'fa-boxes-stacked', 'tag' => 'Godown', 'title' => 'Godowns & Bulk Storage', 'desc' => 'Multi-purpose racking for sacks, cartons, and mixed inventory at scale.', 'recommend' => 'Storage Racks', 'image' => 'Storage.png'],
        ];

        return view('use-cases', compact('scenarios'));
    }

    /**
     * TEMPORARY hardcoded project list — same pattern as
     * ProductController::allProducts(). Move to a real
     * `projects` table once there's an admin panel to manage
     * these instead of editing PHP.
     */
    protected function galleryProjects(): array
    {
        return [
            ['cat' => 'supermarket', 'tag' => 'Supermarket Racks', 'title' => '40-Unit Retail Fitout', 'location' => 'Kanpur, UP', 'image' => 'hero.png'],
            ['cat' => 'warehouse', 'tag' => 'Warehouse Racks', 'title' => '3PL Distribution Center', 'location' => 'Lucknow, UP', 'image' => 'warehouse.png'],
            ['cat' => 'slotted', 'tag' => 'Slotted Angle Racks', 'title' => 'Office Records Storage', 'location' => 'Varanasi, UP', 'image' => 'slotted.png'],
            ['cat' => 'storage', 'tag' => 'Storage Racks', 'title' => 'Cold Storage Godown', 'location' => 'Kanpur, UP', 'image' => 'Storage.png'],
            ['cat' => 'supermarket', 'tag' => 'Supermarket Racks', 'title' => 'Grocery Chain Rollout', 'location' => 'Prayagraj, UP', 'image' => 'supermarket.png'],
            ['cat' => 'warehouse', 'tag' => 'Warehouse Racks', 'title' => 'E-Commerce Fulfilment Hub', 'location' => 'Noida, UP', 'image' => 'heavy-duty.png'],
            ['cat' => 'storage', 'tag' => 'Storage Racks', 'title' => 'Manufacturing Unit Storage', 'location' => 'Kanpur, UP', 'image' => 'office.png'],
            ['cat' => 'slotted', 'tag' => 'Slotted Angle Racks', 'title' => 'Residential Storage Setup', 'location' => 'Lucknow, UP', 'image' => 'adjustable.png'],
            ['cat' => 'supermarket', 'tag' => 'Supermarket Racks', 'title' => 'Pharmacy Chain Display', 'location' => 'Gorakhpur, UP', 'image' => 'compact.png'],
        ];
    }

    public function gallery(Request $request)
    {
        $filter = $request->query('filter', 'all');

        $filterLabels = [
            'all' => 'All Projects',
            'supermarket' => 'Supermarket',
            'warehouse' => 'Warehouse',
            'slotted' => 'Slotted Angle',
            'storage' => 'Storage',
        ];

        // Guard against a garbage ?filter= value in the URL.
        if (!array_key_exists($filter, $filterLabels)) {
            $filter = 'all';
        }

        $projects = collect($this->galleryProjects())
            ->when($filter !== 'all', fn ($items) => $items->where('cat', $filter))
            ->values();

        return view('gallery', compact('projects', 'filter', 'filterLabels'));
    }

    public function bulkOrder()
    {
        $tiers = [
            ['qty' => '10 – 25 Units', 'discount' => 8, 'label' => 'off list price', 'featured' => false],
            ['qty' => '26 – 50 Units', 'discount' => 13, 'label' => 'off list price', 'featured' => false],
            ['qty' => '51 – 100 Units', 'discount' => 18, 'label' => 'off list price + free delivery', 'featured' => true],
            ['qty' => '100+ Units', 'discount' => 22, 'label' => 'off list price + priority production', 'featured' => false],
        ];

        $whyBulk = [
            ['icon' => 'fa-industry', 'title' => 'In-House Fabrication', 'desc' => 'No outsourcing — every rack is cut, welded & coated at our own facility, so we can scale to any order size.'],
            ['icon' => 'fa-ruler-combined', 'title' => 'Custom Specs at Scale', 'desc' => 'Need 200 racks in a specific size or color? We fabricate to your exact spec without per-unit price hikes.'],
            ['icon' => 'fa-truck', 'title' => 'Coordinated Bulk Delivery', 'desc' => 'Single or phased dispatch to one or multiple sites — we handle logistics for large rollouts.'],
            ['icon' => 'fa-handshake', 'title' => 'Dedicated Account Support', 'desc' => 'A single point of contact for your entire order — from quote to installation.'],
        ];

        $sideProcessSteps = [
            'We review your requirement & call to confirm specs.',
            'You receive a formal quote with volume discount applied.',
            'On confirmation, production starts — typically 7–14 days.',
            'Racks are dispatched & delivered to your site(s).',
        ];

        $rackTypes = ['Supermarket Racks', 'Slotted Angle Racks', 'Warehouse Racks', 'Storage Racks'];

        return view('bulk-order', compact('tiers', 'whyBulk', 'sideProcessSteps', 'rackTypes'));
    }

    public function about()
    {
        $features = [
            ['icon' => 'fa-medal', 'title' => 'Premium Grade Steel', 'desc' => 'High-tensile CRCA steel with anti-rust powder coating for long life.'],
            ['icon' => 'fa-ruler-combined', 'title' => 'Fully Custom Sizing', 'desc' => 'Every rack fabricated to your exact space, load & layout requirements.'],
            ['icon' => 'fa-truck', 'title' => 'Pan-India Logistics', 'desc' => 'Direct dispatch from Lucknow to any city — safely packed & insured.'],
            ['icon' => 'fa-certificate', 'title' => 'Warranty Backed', 'desc' => 'Every rack comes with a structural warranty and after-sales support.'],
        ];

        $processSteps = [
            ['num' => 1, 'title' => 'Enquiry', 'desc' => 'Share your requirement via call or form.'],
            ['num' => 2, 'title' => 'Design', 'desc' => 'We plan layout & specs for your space.'],
            ['num' => 3, 'title' => 'Fabrication', 'desc' => 'Racks built in-house with quality steel.'],
            ['num' => 4, 'title' => 'Delivery', 'desc' => 'Safe dispatch & installation support.'],
        ];

        $testimonials = [
            ['initial' => 'R', 'quote' => 'Ordered 40 supermarket racks for our new store — quality and finish were excellent, delivered on time.', 'name' => 'Rajesh Verma', 'role' => 'Retail Chain Owner, Kanpur'],
            ['initial' => 'S', 'quote' => 'Custom warehouse racking for our 3rd party logistics facility. Strong build, handled heavy pallets with ease.', 'name' => 'Sunita Agarwal', 'role' => 'Warehouse Manager, Lucknow'],
            ['initial' => 'A', 'quote' => 'Best pricing for slotted angle racks in bulk. Great support team, will order again for our new branch.', 'name' => 'Amit Singh', 'role' => 'Business Owner, Varanasi'],
        ];

        return view('about', compact('features', 'processSteps', 'testimonials'));
    }

    /**
     * General "Contact Us" page — for people with questions not tied
     * to a specific product or bulk quantity. Submits through the
     * same submitQuote() handler as the other two forms, just with
     * quantity/product left empty and source set to identify it.
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Handles the quote/contact request form — shared by the product
     * detail page, the bulk-order page, and the general Contact Us
     * page. Every submission saves to the database (so nothing is
     * lost even if email delivery fails or SMTP isn't configured yet)
     * and sends a notification email to the SM Racks inbox.
     *
     * `source` records which of the three forms this came from —
     * shown in the admin panel so the team knows the context of
     * every inquiry at a glance.
     *
     * NOTE on email delivery: MAIL_MAILER is set to "log" in the
     * default .env, which writes emails to storage/logs/laravel.log
     * instead of actually sending them — safe for local development.
     * Switch MAIL_MAILER to "smtp" (with real MAIL_HOST/USERNAME/
     * PASSWORD from your email provider, or a service like Mailgun/
     * SES/Resend) before going live, or nothing will actually arrive
     * in the inbox.
     */
    public function submitQuote(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:150',
            'quantity' => 'nullable|integer|min:1',
            'message' => 'nullable|string|max:1000',
            'product' => 'nullable|string|max:150',
            'source' => 'nullable|string|max:100',
            // Extra fields used by the bulk-order form specifically:
            'company' => 'nullable|string|max:150',
            'delivery_city' => 'nullable|string|max:100',
            'rack_type' => 'nullable|string|max:100',
        ]);

        $validated['source'] = $validated['source'] ?? 'Website';

        $quoteRequest = QuoteRequest::create($validated);

        try {
            Mail::to('gauravmishra3851@gmail.com')->send(new QuoteRequestMail($quoteRequest));

            if ($quoteRequest->email) {
                Mail::to($quoteRequest->email)->send(new QuoteConfirmationMail($quoteRequest));
            }
        } catch (\Throwable $e) {
            // Don't fail the whole request just because email delivery
            // had a problem — the submission is already safely saved
            // in the database either way.
            report($e);
        }

        return back()->with('quote_success', 'Thanks! Your message has been received — our team will reach out within 24 hours.');
    }

    /**
     * Dynamic sitemap.xml — keeps the sitemap in sync automatically
     * as pages/products are added, instead of hand-maintaining a
     * static file.
     */
    public function sitemap()
    {
        $staticUrls = [
            ['url' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['url' => route('products.index'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => route('use-cases'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('gallery'), 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => route('bulk-order'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('about'), 'priority' => '0.5', 'changefreq' => 'monthly'],
        ];

        $categories = ['supermarket', 'slotted-angle', 'warehouse', 'storage', 'heavy-duty', 'boltless', 'cold-storage', 'office'];
        foreach ($categories as $cat) {
            $staticUrls[] = [
                'url' => route('products.index', ['cat' => $cat]),
                'priority' => '0.7',
                'changefreq' => 'weekly',
            ];
        }

        // Real product pages, pulled straight from the database.
        Product::query()->active()->get()->each(function ($product) use (&$staticUrls) {
            $staticUrls[] = [
                'url' => route('products.show', $product),
                'priority' => '0.6',
                'changefreq' => 'weekly',
            ];
        });

        $xml = view('sitemap', compact('staticUrls'))->render();

        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }
}