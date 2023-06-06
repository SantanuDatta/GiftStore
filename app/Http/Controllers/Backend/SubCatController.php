<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\SubCatRequest;
use App\Models\Category;
use App\Services\CategoryService;

class SubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::whereHas('parentCategory')->with('parentCategory')->asc('name')->get();
        $parentCat  = Category::parent()->asc('name')->pluck('name', 'id');

        return view('backend.pages.categories.sub.manage', compact('categories', 'parentCat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryService $categoryService, SubCatRequest $request)
    {
        $categoryService->storeSub($request->validated());

        return redirect()->route('sub.category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryService $categoryService, SubCatRequest $request)
    {
        $categoryService->updateSub($category, $request->validated());

        return redirect()->route('sub.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, CategoryService $categoryService)
    {
        $categoryService->deleteSub($category);

        return redirect()->route('sub.category');
    }
}
