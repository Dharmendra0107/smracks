<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->search, fn ($q, $search) => $q->where('name', 'like', "%{$search}%"))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $product = new Product(); // empty instance so the shared form partial can reuse the same field names
        $categories = $this->categoryOptions();

        return view('admin.products.create', compact('product', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);
        $validated['slug'] = $this->uniqueSlug($validated['name']);
        $validated['specs'] = $this->parseSpecs($request->input('specs_text'));

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        $categories = $this->categoryOptions();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $this->validateProduct($request, $product->id);

        // Only regenerate the slug if the name actually changed —
        // otherwise editing other fields would silently break every
        // existing link/bookmark to this product's URL.
        if ($validated['name'] !== $product->name) {
            $validated['slug'] = $this->uniqueSlug($validated['name'], $product->id);
        }

        $validated['specs'] = $this->parseSpecs($request->input('specs_text'));

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product deleted.');
    }

    protected function validateProduct(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:150',
            'desc' => 'required|string|max:500',
            'cat' => 'required|string|max:50',
            'cat_label' => 'required|string|max:100',
            'badge' => 'nullable|string|max:30',
            'image' => 'required|string|max:150',
            'price' => 'required|integer|min:0',
            'old_price' => 'required|integer|min:0|gte:price',
            'is_active' => 'nullable|boolean',
        ]);
    }

    /**
     * Specs are entered in the admin form as plain "Label: Value" lines
     * (one per line) for simplicity, then converted to the same
     * associative array the rest of the app expects.
     */
    protected function parseSpecs(?string $text): array
    {
        if (!$text) {
            return [];
        }

        $specs = [];
        foreach (explode("\n", $text) as $line) {
            if (str_contains($line, ':')) {
                [$label, $value] = explode(':', $line, 2);
                $label = trim($label);
                $value = trim($value);
                if ($label !== '' && $value !== '') {
                    $specs[$label] = $value;
                }
            }
        }

        return $specs;
    }

    protected function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;

        while (Product::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . (++$i);
        }

        return $slug;
    }

    protected function categoryOptions(): array
    {
        return [
            'supermarket'   => 'Supermarket Racks',
            'slotted-angle' => 'Slotted Angle Racks',
            'warehouse'     => 'Warehouse Racks',
            'storage'       => 'Storage Racks',
            'heavy-duty'    => 'Heavy Duty Racks',
            'boltless'      => 'Boltless Racks',
            'cold-storage'  => 'Cold Storage Racks',
            'office'        => 'Office & Home Racks',
        ];
    }
}