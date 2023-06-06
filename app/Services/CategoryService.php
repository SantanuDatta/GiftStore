<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryService
{
    //Main Category Store
    public function storeMain($mainCat)
    {
        $mainCat = Category::create($mainCat);
        if (request()->hasFile('image')) {
            $image = request()->file('image');

            // save the new image file
            $img      = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = Storage::disk('mainCat')->path($img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            $mainCat->image = $img;
        }

        $mainCat->slug = Str::slug(request('name'));
        $mainCat->save();
    }

    //Main Category Update
    public function updateMain(Category $mainCat)
    {
        if (request()->hasFile('image')) {
            // delete the old image file
            if (!empty($mainCat->image)) {
                Storage::disk('mainCat')->delete($mainCat->image);
            }

            // save the new image file
            $image    = request()->file('image');
            $img      = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = Storage::disk('mainCat')->path($img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            // update the category record with the new image filename
            $mainCat->image = $img;
        }

        $mainCat->slug = Str::slug(request('slug'));
        $mainCat->update();
    }

    //Main Category Delete
    public function deleteMain(Category $mainCat)
    {
        if ($mainCat->is_parent == 0) {
            foreach (Category::where('is_parent', $mainCat->id)->get() as $sCat) {
                $sCat->is_parent = 1;
                $sCat->save();
            }
        }

        // delete the old image file
        if (!empty($mainCat->image)) {
            Storage::disk('mainCat')->delete($mainCat->image);
        }

        $mainCat->delete();
    }

    //Sub Category Store
    public function storeSub($subCat)
    {
        $subCat = Category::create($subCat);
        if (request()->hasFile('image')) {
            $image = request()->file('image');

            // save the new image file
            $img      = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = Storage::disk('subCat')->path($img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            $subCat->image = $img;
        }

        $subCat->slug = Str::slug(request('name'));
    }

    //Sub Category Update
    public function updateSub(Category $subCat)
    {
        if (request()->hasFile('image')) {
            // delete the old image file
            if (!empty($subCat->image)) {
                Storage::disk('subCat')->delete($subCat->image);
            }

            // save the new image file
            $image    = request()->file('image');
            $img      = uniqid() . '.' . $image->getClientOriginalExtension();
            $location = Storage::disk('subCat')->path($img);

            $imageResize = Image::make($image);
            $imageResize->fit(300, 300)->save($location);

            // update the category record with the new image filename
            $subCat->image = $img;
        }

        $subCat->slug = Str::slug(request('slug'));
        $subCat->update();
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
