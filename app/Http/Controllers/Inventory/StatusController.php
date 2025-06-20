<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StatusRequest;
use App\Http\Requests\Inventory\UpdateRequest;
use App\Models\Inventory\Status;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::active()->get();
        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $statuses = Status::active()->get();
        return view('statuses.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request)
    {
        $validatedData = $request->validated();
        Status::create($validatedData);
        return redirect()->back()->with('success', __('messages.create_status'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        $objectdata = Status::findOrFail($status->id);
        $editForm = view('forms.edit.status', compact('objectdata'))->render();

        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Status $status)
    {
        $validatedData = $request->validated();
        $status->update($validatedData);
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'action' => 'status',
                'message' => 'Status updated successfully.',
            ]);
        }
        return redirect()->route('statuses.index')->with('success', __('messages.update_status'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->destroy($status->id);
        return response()->json([
         'action' => 'delete'
        ]);
    }
}
