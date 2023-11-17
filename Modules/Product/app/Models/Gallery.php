<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\GalleryFactory;

class Gallery extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'image',
      ];    
    protected static function newFactory(): GalleryFactory
    {
        //return GalleryFactory::new();
    }
    public function getProducts()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
