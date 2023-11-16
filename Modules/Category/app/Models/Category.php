<?php

namespace Modules\Category\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Database\factories\CategoryFactory;
use Modules\Product\app\Models\Product;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title_az',
        'title_en',
        'title_ru',
        'desc_az',
        'desc_en',
        'desc_ru',
        'image',
      ];
          
    protected static function newFactory(): CategoryFactory
    {
        //return CategoryFactory::new();
    }
    public function products()
    {
        return $this->hasMany(Product::class,'cat_id','id');
    }
}
