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
        $categories = Category::parent()->orderAsc()->get();
        return view('backend.pages.categories.main.manage', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryService $categoryService, MainCatRequest $request)
    {
        $mainCat = Category::create($request->validated());
        $categoryService->storeMain($mainCat);

        return redirect()->route('main.category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryService $categoryService, MainCatRequest $request)
    {
        $mainCat = $category;
        $oldImage = $mainCat->image;
        
        $mainCat->update($request->validated());
        $categoryService->updateMain($oldImage, $mainCat);

        return redirect()->route('main.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, CategoryService $categoryService)
    {
        $mainCat = $category;
        $categoryService->deleteMain($mainCat);
        
        return redirect()->route('main.category');
    }
}
