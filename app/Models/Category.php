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

    //Query Scopes
    public function scopeOrderAsc($query)
    {
        return $query->orderBy('name', 'asc');
    }

    public function scopeParent($query)
    {
        return $query->where('is_parent', 0);
    }

    //Relations
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'is_parent');
    }

    public function childrenCat()
    {
        return $this->hasMany(Category::class, 'is_parent');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
