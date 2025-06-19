<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\CategoryRequest;
use App\Http\Requests\inventory\UpdateCategory;
use App\Models\Inventory\Category;
use App\Services\StaticDataService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::active()->latest()->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->latest()->get();
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        Category::create($validatedData);
        return redirect()->back()->with('success', 'Category successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, StaticDataService $staticData)
    {
        $objectdata = Category::findOrFail($category->id);
        $data = $staticData->staticData();
        $editForm = view('forms.edit.category', compact('objectdata', 'data'))->render();
        return response()->json([
            'action' => 'edit',
            'editForm' => $editForm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategory  $request, Category $category)
    {
        $validatedData = $request->validated();
        $category->update($validatedData);
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'action' => 'status',
                'message' => 'Status updated successfully.',
            ]);
        }
        return redirect()->route('categories.index')->with('success', __('messages.update_category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Request $request)
    {

        if ($category) {
            $category->destroy($category->id);
            return response()->json(
                ['action' => 'delete']
            );
        } else {
        }
    }
}
