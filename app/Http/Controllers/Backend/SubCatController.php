<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use File;
use Illuminate\Http\Request;
use Image;
use Str;

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
        $categories = Category::whereHas('parentCategory')->with('parentCategory')->orderBy('name', 'asc')->get();
        $parentCat = Category::where('is_parent', 0)->orderBy('name', 'asc')->get();
        return view('backend.pages.categories.sub.manage', compact('categories', 'parentCat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subCat = Category::create($this->validateCategory());

        if (request()->hasFile('image')) {
            $image = request()->file('image');

            // save the new image file
            $img = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/categories/' . $img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            $subCat->image = $img;
        }

        $subCat->slug = Str::slug($request->name);
        $subCat->save();
        return redirect()->route('sub.category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category)
    {
        $subCat = $category;

        $subCat->update($this->validateCategory($subCat->id));

        if (request()->hasFile('image')) {
            // delete the old image file
            if (!empty($subCat->image) && File::exists('backend/img/categories/' . $subCat->image)) {
                File::delete('backend/img/categories/' . $subCat->image);
            }

            // save the new image file
            $image = request()->file('image');
            $img = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/categories/' . $img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            // update the category record with the new image filename
            $subCat->image = $img;
        } else {
            // If no new image is provided, update the image property with the existing value
            $subCat->image = $subCat->image;
        }

        $subCat->slug = Str::slug(request('slug'));
        $subCat->save();
        return redirect()->route('sub.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $subCat = $category;

        // delete the old image file
        if (!empty($subCat->image) && File::exists('backend/img/categories/' . $subCat->image)) {
            File::delete('backend/img/categories/' . $subCat->image);
        }

        $subCat->delete();
        return redirect()->route('sub.category');
    }
}
