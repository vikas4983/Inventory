<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\ProductRequest;
use App\Http\Requests\Inventory\UpdateProduct;
use App\Models\Inventory\Product;
use App\Services\StaticDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::active()->latest()->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StaticDataService $staticData)
    {
        $data = $staticData->staticData();
        $products = Product::active()->latest()->get();
        return view('products.create', compact('products', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $validatedData = $request->validated();
        $validatedData['sku'] = 'PRD-' . strtoupper(Str::random(8));
        Product::create($validatedData);
        return redirect()->back()->with('success', 'Product successfully Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, StaticDataService $staticData)
    {
        $objectdata = Product::findOrFail($product->id);
        $data = $staticData->staticData();
        $editForm = view('forms.edit.product', compact('objectdata', 'data'))->render();

        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduct $request, Product $product)
    {

        $validatedData = $request->validated();
        $product->update($validatedData);
        if ($request->wantsjson() || $request->ajax()) {
            return response()->json([
                'action' => 'status',
            ]);
        }
        return redirect()->route('products.index')->with('success', __('messages.update_product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product) {
            $product->destroy($product->id);
            return response()->json(
                ['action' => 'delete']
            );
        } else {
        }
    }
}
