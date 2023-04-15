<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CodeExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Imports\CodeImport;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Excel;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category:id,name')->orderDesc()->get();
        $categories = Category::select('id', 'name')->with(['products:id,code,category_id,status', 'parentCategory:id,name', 'childrenCat:id,name,is_parent'])->parent()->orderAsc()->get();
        return view('backend.pages.products.manage', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::Create($request->validated());
        $product->save();

        return redirect()->route('product.manage');
    }

    public function import(ProductRequest $request)
    {
        try {
            $request->validated(); // Validate the incoming request data

            $file = $request->file('code'); // Get the uploaded file
            $category_id = $request->input('category_id'); // Get the selected category ID

            Excel::import(new CodeImport($category_id), $file); // Import the data from the file
            return redirect()->route('product.manage');

        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) { // Duplicate entry error code
                return back()->withErrors(['code' => 'The code already exists.'])->withInput();
            } else {
                return back()->withErrors(['error' => 'Error importing file. Please try again.'])->withInput();
            }
        }
    }

    public function export()
    {
        $products = Product::with('category')->get(['code', 'category_id', 'status']);
        $fileName = 'codes_' . Carbon::now()->setTimezone('+6')->format('d-M-y_h-i-a') . '.csv';
        return Excel::download(new CodeExport($products), $fileName);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, ProductRequest $request)
    {
        $product = $product;

        $product->update($request->validated());
        $product->save();

        return redirect()->route('product.manage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product = $product;
        $product->delete();
        
        return redirect()->route('product.manage');
    }
}
