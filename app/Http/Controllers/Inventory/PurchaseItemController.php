<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\PurchaseItemRequest;
use App\Http\Requests\Inventory\UpdatePurchaseItem;
use App\Models\Inventory\PurchaseItem;
use App\Services\StaticDataService;
use Illuminate\Http\Request;

class PurchaseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseItems = PurchaseItem::active()->get();
        return view('purchaseItems.index', compact('purchaseItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StaticDataService $staticData)
    {
        $data = $staticData->staticData();
        return view('purchaseItems.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseItemRequest $request)
    {
        $validatedData = $request->validated();
        PurchaseItem::create($validatedData);
        return redirect()->back()->with('success', __('messages.create_purchase_item'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseItem $purchaseItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseItem $purchaseItem, StaticDataService $staticData)
    {
        $data = $staticData->staticData();
        $objectdata = $purchaseItem;
        $editForm = view('forms.edit.purchaseItem', compact('data', 'objectdata'))->render();
        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseItem $request, PurchaseItem $purchaseItem)
    {
        $validatedData = $request->validated();
        $purchaseItem->update($validatedData);
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'action' => 'status',
            ]);
        }
        return redirect()->route('purchaseItems.index')->with('success', __('messages.update_purchase_item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseItem $purchaseItem)
    {
        $purchaseItem->destroy($purchaseItem->id);
        return response()->json([
            'action' => 'delete'
        ]);
    }
}
