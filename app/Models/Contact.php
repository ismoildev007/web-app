<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_uz', 'address_ru', 'address_en',
        'email', 'phone1', 'phone2',
        'facebook', 'instagram', 'telegram', 'youtube',
    ];
}
