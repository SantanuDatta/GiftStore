<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Imports\CodeImport;
use App\Models\Product;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class ProductController extends Controller
{
    protected function validateProduct()
    {
        $rules = [
            'category_id' => 'required|exists:categories,id',
        ];

        // Add the 'file' and 'mimes' rules only if a file has been uploaded
        if (request()->hasFile('code')) {
            $rules['code'] = 'required|file|mimes:csv,txt|unique:products,code';
        } else {
            $rules['code'] = 'required|unique:products,code';
        }

        return request()->validate($rules);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id', 'desc')->get();
        return view('backend.pages.products.manage', compact('products'));
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
    public function store(Request $request)
    {
        $product = Product::Create($this->validateProduct());

        $product->save();
        return redirect()->route('product.manage');
    }

    public function import(Request $request)
    {
        try {
            $this->validateProduct(); // Validate the incoming request data

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
        return Excel::download(new ProductExport($products), $fileName);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
