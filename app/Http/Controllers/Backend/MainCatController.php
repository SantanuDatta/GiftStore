<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use File;
use Illuminate\Http\Request;
use Image;
use Str;

class MainCatController extends Controller
{
    protected function validateCategory($id = null)
    {
        //For image = size:1024|dimensions:max_width=300,mnn_height=300
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
        $categories = Category::where('is_parent', 0)->orderBy('name', 'asc')->get();
        return view('backend.pages.categories.main.manage', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mainCat = Category::create($this->validateCategory());

        if (request()->hasFile('image')) {
            $image = request()->file('image');

            // save the new image file
            $img = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/categories/' . $img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            $mainCat->image = $img;
        }

        $mainCat->slug = Str::slug($request->name);
        $mainCat->save();
        return redirect()->route('main.category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category)
    {
        $mainCat = $category;

        $mainCat->update($this->validateCategory($mainCat->id));
        if (request()->hasFile('image')) {
            // delete the old image file
            if (!empty($mainCat->image) && File::exists('backend/img/categories/' . $mainCat->image)) {
                File::delete('backend/img/categories/' . $mainCat->image);
            }

            // save the new image file
            $image = request()->file('image');
            $img = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = public_path('backend/img/categories/' . $img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            // update the category record with the new image filename
            $mainCat->image = $img;
        } else {
            // If no new image is provided, update the image property with the existing value
            $mainCat->image = $mainCat->image;
        }

        $mainCat->slug = Str::slug(request('slug'));

        $mainCat->save();
        return redirect()->route('main.category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $mainCat = $category;

        if ($mainCat->is_parent == 0) {
            foreach (Category::where('is_parent', $mainCat->id)->get() as $sCat) {
                $sCat->is_parent = 1;
                $sCat->save();
            }
        }

        // delete the old image file
        if (!empty($mainCat->image) && File::exists('backend/img/categories/' . $mainCat->image)) {
            File::delete('backend/img/categories/' . $mainCat->image);
        }

        $mainCat->delete();
        return redirect()->route('main.category');
    }
}
