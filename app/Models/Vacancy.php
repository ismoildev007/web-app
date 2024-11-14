<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz', 'name_ru', 'name_en',
        'title_uz', 'title_ru', 'title_en',
        'content_uz', 'content_ru', 'content_en',
        'image', 'date', 'status',
    ];
}
