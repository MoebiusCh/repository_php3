<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'price',
        'sale',
        'description',
        'detail',
        'status',
        'is_hot',
        'sale_rate',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeSearch($query, $term)
    {
        if ($term) {
            $term = "%$term%";
            $query->where(function ($query) use ($term) {
                $query->where('title', 'like', $term);
            });
        }
        return $query;
    }
    /*  public function scopeSortBy($query, $sortField)
    {
        if ($sortField) {
            $query->orderBy($sortField);
        }
        return $query;
    } */
}
