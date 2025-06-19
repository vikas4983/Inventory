<?php

namespace App\Http\Controllers\inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\inventory\SupplierRequest;
use App\Http\Requests\inventory\UpdateSupplier;
use App\Models\inventory\Supplier;
use App\Services\StaticDataService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::active()->latest()->get();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        $validatedData = $request->validated();
        Supplier::create($validatedData);
        return redirect()->back()->with('success', __('messages.create_supplier'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $objectdata = Supplier::findOrFail($supplier->id);
        $editForm = view('forms.edit.supplier', compact('objectdata'))->render();

        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplier $request, Supplier $supplier)
    {
        $validatedData = $request->validated();
        $supplier->update($validatedData);
         if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'action' => 'status',
            ]);
        }
        return redirect()->route('suppliers.index')->with('success', __('messages.update_supplier'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        if ($supplier) {
            $supplier->destroy($supplier->id);
            return response()->json(
                ['action' => 'delete']
            );
        }
    }
}
