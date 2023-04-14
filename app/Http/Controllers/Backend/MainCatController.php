<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;

class MainCatController extends Controller
{
    protected function validateCategory($id = null)
    {
        //For image = max:1024|dimensions:max_width=300,min_height=300
        $rules = [
            'name' => 'required|min:5|max:25|unique:categories,name' . ($id ? ',' . $id : ''),
            'slug' => ($id ? 'required|' : '') . 'max:25|unique:categories,slug,' . $id,
            'is_parent' => 'nullable',
            'description' => 'nullable',
            'regular_price' => 'nullable',
            'discount' => 'nullable',
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
        $categories = Category::parent()->orderAsc()->get();
        return view('backend.pages.categories.main.manage', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryService $categoryService)
    {
        $mainCat = Category::create($this->validateCategory());
        $categoryService->storeMain($mainCat);

        return redirect()->route('main.category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryService $categoryService)
    {
        $mainCat = $category;
        $oldImage = $mainCat->image;
        
        $mainCat->update($this->validateCategory($mainCat->id));
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
