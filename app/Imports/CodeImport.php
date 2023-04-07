<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class CodeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Get the category ID from the form input
        $categoryId = request('category_id');

        // Create a new Product object and set its properties from the CSV row
        $product = new Product([
            'category_id' => $categoryId,
            'code' => $row[0],
            'status' => 1 // Set the status to active by default
        ]);

        // Save the product to the database
        $product->save();

        // Return the product object
        return $product;
    }
}
