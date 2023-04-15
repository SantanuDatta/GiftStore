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
        $categories = Category::whereHas('parentCategory')->with('parentCategory:id,name')->orderAsc()->get();
        $parentCat = Category::select('id', 'name')->parent()->orderAsc()->get();
        return view('backend.pages.categories.sub.manage', compact('categories', 'parentCat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryService $categoryService, SubCatRequest $request)
    {
        $subCat = Category::create($request->validated());
        $categoryService->storeSub($subCat);

        return redirect()->route('sub.category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryService $categoryService, SubCatRequest $request)
    {
        $subCat = $category;
        $oldImage = $subCat->image;

        $subCat->update($request->validated());
        $categoryService->updateSub($oldImage, $subCat);

        return redirect()->route('sub.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, CategoryService $categoryService)
    {
        $subCat = $category;
        $categoryService->deleteSub($subCat);

        return redirect()->route('sub.category');
    }
}
