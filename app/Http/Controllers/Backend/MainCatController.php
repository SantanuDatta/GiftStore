<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\MainCatRequest;
use App\Models\Category;
use App\Services\CategoryService;

class MainCatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::parent()->asc('name')->get();

        return view('backend.pages.categories.main.manage', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryService $categoryService, MainCatRequest $request)
    {
        $categoryService->storeMain($request->validated());

        return redirect()->route('main.category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryService $categoryService, MainCatRequest $request)
    {
        $categoryService->updateMain($category, $request->validated());

        return redirect()->route('main.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, CategoryService $categoryService)
    {
        $categoryService->deleteMain($category);

        return redirect()->route('main.category');
    }
}
