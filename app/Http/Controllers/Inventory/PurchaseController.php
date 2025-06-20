<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\PurchaseRequest;
use App\Http\Requests\Inventory\UpdatePurchase;
use App\Models\Inventory\Purchase;
use App\Services\StaticDataService;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::active()->get();
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StaticDataService $staticData)
    {
        $data = $staticData->staticData();
        return view('purchases.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseRequest $request)
    {
        $validatedData = $request->validated();

        Purchase::create($validatedData);
        return redirect()->back()->with('success', __('messages.create_purchase'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase, StaticDataService $staticData)
    {   
        $objectdata = $purchase;
        $data = $staticData->staticData();
        $editForm = view('forms.edit.purchase', compact('objectdata','data'))->render();

        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchase $request, Purchase $purchase)
    {
        $validatedData = $request->validated();
        $purchase->update($validatedData);
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'action' => 'status',
            ]);
        }
        return redirect()->route('purchases.index')->with('success', __('messages.update_status'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->destroy($purchase->id);
        return response()->json([
            'action' => 'delete'
        ]);
    }
}
