<?php

namespace App\Models;

use App\Models\Products;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function products(): HasMany
    // {
    //     return $this->hasMany(Products::class);
    // }

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }

    public function productsCount()
    {
        return $this->hasManyThrough(Products::class, SubCategory::class)->count();
    }

}
