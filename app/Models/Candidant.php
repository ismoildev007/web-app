<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidant extends Model
{
    use HasFactory;

    protected $fillable = [
        'vacancy_id', 'name', 'email', 'brith_date', 'phone', 'comment', 'resume_file', 'status',
    ];
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
