<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'code',
        'status',
    ];

    //Query Scopes
    public function scopeDesc($query, $value)
    {
        return $query->orderBy($value, 'desc');
    }

    //Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
