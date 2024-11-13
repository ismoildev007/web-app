<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en',
        'content_uz', 'content_ru', 'content_en',
        'description_uz', 'description_ru', 'description_en',
        'image',
    ];
}
