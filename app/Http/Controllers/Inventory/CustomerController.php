<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\CustomerRequest;
use App\Http\Requests\Inventory\UpdateCustomer;
use App\Models\Inventory\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::active()->get();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $validatedData  = $request->validated();
        Customer::create($validatedData);
        return redirect()->back()->with('success', __('messages.create_customer'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $objectdata = $customer;
        $editForm = view('forms.edit.customer', compact('objectdata'))->render();
        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomer $request, Customer $customer)
    {
        $validatedData = $request->validated();
        $customer->update($validatedData);
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'action' => 'status',
            ]);
        }
        return redirect()->route('customers.index')->with('success', __('messages.update_customer'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if ($customer) {
            $customer->destroy($customer->id);
            return response()->json(
                ['action' => 'delete']
            );
        }
    }
}
