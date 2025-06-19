<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\SaleRequest;
use App\Http\Requests\Inventory\UpdateSale;
use App\Models\Inventory\Sale;
use App\Services\StaticDataService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::active()->get();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StaticDataService $staticData)
    {
        $data = $staticData->staticdata();
        return view('sales.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request)
    {
        $validatedData  = $request->validated();
        Sale::create($validatedData);
        return redirect()->back()->with('success', __('messages.create_sale'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale, StaticDataService $staticData)
    {
        $objectdata = $sale;
        $data = $staticData->staticdata();
        $editForm = view('forms.edit.sale', compact('data', 'objectdata'))->render();
        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSale $request, Sale $sale)
    {
        $validatedData = $request->validated();
        $sale->update($validatedData);
        if ($request->wantsjson() || $request->Ajax()) {
            return response()->json([
                'action' => 'status'
            ]);
        }
        return redirect()->route('sales.index')->with('success', __('messages.update_sale'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->destroy($sale->id);
        return response()->json([
            'action' => 'delete'
        ]);
    }
}
