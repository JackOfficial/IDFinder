<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idtype extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_type',
        'photo',
        'description',
    ];
}
