<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductFactory;
use Modules\Category\app\Models\Category;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'cat_id',
        'title_az',
        'title_en',
        'title_ru',
        'desc_az',
        'desc_en',
        'desc_ru',
        'image',
      ];
          
    protected static function newFactory(): ProductFactory
    {
        //return ProductFactory::new();
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }
    public function gallery()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
}
