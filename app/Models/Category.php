<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public function parent_category()
    {
        return $this->belongsTo(__CLASS__);
    }

    public function child_category()
    {
        return $this->hasMany(__CLASS__);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
