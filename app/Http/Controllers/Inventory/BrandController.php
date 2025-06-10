<?php

namespace App\Http\Controllers\inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\inventory\BrandRequest;
use App\Models\inventory\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::active()->latest()->get();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::active()->latest()->get();
        return view('brands.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $validatedData = $request->validated();
        Brand::create($validatedData);
        return redirect()->back()->with('success', 'Brand successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand, Request $request) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $validatedData = $request->validated();
        if (isset($validatedData['is_active']) && isset($validatedData['name'])) {
            $brand = Brand::where('id', $brand->id)->first();
            $brand->update($validatedData);
            return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
        } else {
            $brand = Brand::where('id', $brand->id)->first();
            $brand->update($validatedData);
            return response()->json([
                'action' => 'status'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if ($brand) {
            $brand->destroy($brand->id);
            return response()->json(
                ['action' => 'delete']
            );
        } else {
        }
    }
}
