<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryService
{
    //Main Category Store
    public function storeMain(array $mainCat): Category
    {
        $category = Category::create($mainCat);
        if (request()->hasFile('image')) {
            $image = request()->file('image');

            // save the new image file
            $img      = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = Storage::disk('mainCat')->path($img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            $category->image = $img;
            $category->save();
        }

        return $category;
    }

    //Main Category Update
    public function updateMain(Category $category, array $mainCat): Category
    {
        if (request()->hasFile('image')) {
            // delete the old image file
            if (!empty($category->image)) {
                Storage::disk('mainCat')->delete($category->image);
            }

            // save the new image file
            $image    = request()->file('image');
            $img      = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = Storage::disk('mainCat')->path($img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            // update the category record with the new image filename
            $mainCat['image'] = $img;
        }
        $category->update($mainCat);

        return $category;
    }

    //Main Category Delete
    public function deleteMain(Category $mainCat)
    {
        if ($mainCat->is_parent == 0) {
            Category::where('is_parent', $mainCat->id)->update(['is_parent' => 1]);
        }

        // delete the old image file
        if (!empty($mainCat->image)) {
            Storage::disk('mainCat')->delete($mainCat->image);
        }

        $mainCat->delete();
    }

    //Sub Category Store
    public function storeSub(array $subCat): Category
    {
        $category = Category::create($subCat);
        if (request()->hasFile('image')) {
            $image = request()->file('image');

            // save the new image file
            $img      = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = Storage::disk('subCat')->path($img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            $category->image = $img;
            $category->save();
        }

        return $category;
    }

    //Sub Category Update
    public function updateSub(Category $category, array $subCat): Category
    {
        if (request()->hasFile('image')) {
            // delete the old image file
            if (!empty($category->image)) {
                Storage::disk('subCat')->delete($category->image);
            }

            // save the new image file
            $image    = request()->file('image');
            $img      = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = Storage::disk('subCat')->path($img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            // update the category record with the new image filename
            $subCat['image'] = $img;
        }
        $category->update($subCat);

        return $category;
    }

    //Sub Category Delete
    public function deleteSub(Category $subCat)
    {
        // delete the old image file
        if (!empty($subCat->image)) {
            Storage::disk('subCat')->delete($subCat->image);
        }

        $subCat->delete();
    }
}
