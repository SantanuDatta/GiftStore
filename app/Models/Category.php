<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_parent',
        'regular_price',
        'discount',
        'is_featured',
        'status',
    ];

    // Change id to slug or any other method for route
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'is_parent', 0);
    }
}
