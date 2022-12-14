<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;
    protected $fillable = [
        'idtype_id',
        'owner_name',
        'dob',
        'gender',
        'place_of_issue',
        'id_number',
        'photos',
        'description',
        'status',
    ];
}
