<?php

namespace App\Http\Controllers\inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\inventory\ProductRequest;
use App\Models\inventory\Product;
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
        $editForm = view('forms.editForm', compact('objectdata', 'data'))->render();

        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {

        $validatedData = $request->validated();
        if (isset($validatedData['is_active']) && count($validatedData) === 1) {
            $Product = Product::where('id', $product->id)->first();
            $Product->update($validatedData);
            return response()->json([
                'action' => 'status'
            ]);
        } else {
            $Product = Product::where('id', $product->id)->first();
            $Product->update($validatedData);
            return redirect()->route('products.index')->with('success', 'Product updated successfully!');
        }
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
