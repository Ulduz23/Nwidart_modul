<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductFactory;

class Product extends Model
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
          
    protected static function newFactory(): ProductFactory
    {
        //return ProductFactory::new();
    }
}
