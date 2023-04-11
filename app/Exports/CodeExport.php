<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class CodeExport implements FromCollection
{
    protected $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->products->map(function ($product) {
            return [
                'code' => $product->code,
                'category_name' => $product->category->name,
                'status' => $product->status,
            ];
        });
    }
}
