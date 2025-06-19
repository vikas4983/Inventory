<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\SaleItemRequest;
use App\Http\Requests\Inventory\UpdateSaleItem;
use App\Models\Inventory\SaleItem;
use App\Services\StaticDataService;
use Illuminate\Http\Request;

class SaleItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $saleItems = SaleItem::active()->get();
        return view('saleItems.index', compact('saleItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StaticDataService $staticdata)
    {
        $data  = $staticdata->staticData();
        return view('saleItems.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleItemRequest $request)
    {
         $validatedData = $request->validated();
        SaleItem::create($validatedData);
        return redirect()->back()->with('success', __('messages.create_sale_item'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleItem $saleItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaleItem $saleItem, StaticDataService $staticdata)
    {
        $data = $staticdata->staticData();
        $objectdata = $saleItem;
        $editForm = view('forms.edit.saleItem', compact('data', 'objectdata'))->render();
        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleItem $request, SaleItem $saleItem)
    {
        $validatedData = $request->validated();
        $saleItem->update($validatedData);
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'action' => 'status',
            ]);
        }
        return redirect()->route('saleItems.index')->with('success', __('messages.update_sale_item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaleItem $saleItem)
    {
        $saleItem->destroy($saleItem->id);
        return response()->json([
            'action' => 'delete'
        ]);
    }
}
