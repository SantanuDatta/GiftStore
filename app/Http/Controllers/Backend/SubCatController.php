<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;

class SubCatController extends Controller
{
    protected function validateCategory($id = null)
    {
        //For image = size:1024|dimensions:max_width=300,mnn_height=300
        $rules = [
            'name' => 'required|min:5|max:25|unique:categories,name' . ($id ? ',' . $id : ''),
            'slug' => ($id ? 'required|' : '') . 'max:25|unique:categories,slug,' . $id,
            'is_parent' => 'nullable',
            'description' => 'nullable',
            'regular_price' => 'required|numeric|min:0|not_in:0',
            'discount' => 'nullable|numeric|min:0|not_in:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_featured' => 'nullable',
            'status' => 'required',
        ];
        return request()->validate($rules);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::whereHas('parentCategory')->with('parentCategory')->orderAsc()->get();
        $parentCat = Category::parent()->orderAsc()->get();
        return view('backend.pages.categories.sub.manage', compact('categories', 'parentCat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryService $categoryService)
    {
        $subCat = Category::create($this->validateCategory());
        $categoryService->storeSub($subCat);

        return redirect()->route('sub.category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryService $categoryService)
    {
        $subCat = $category;
        $oldImage = $subCat->image;

        $subCat->update($this->validateCategory($subCat->id));
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
