<?php

namespace App\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $fillable = [
    'title_az',
    'title_en',
    'title_ru',
    'desc_az',
    'desc_en',
    'desc_ru',
    'image',
  ];
}
