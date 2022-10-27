<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_name',
        'dob',
        'gender',
        'place_of_issue',
        'id_number',
        'photo',
        'front_photo',
        'back_photo',
        'description',
        'status',
    ];
}
