<?php

namespace Modules\Blog\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Database\factories\BlogFactory;

class Blog extends Model
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
          
    protected static function newFactory(): BlogFactory
    {
        //return BlogFactory::new();
    }
}
