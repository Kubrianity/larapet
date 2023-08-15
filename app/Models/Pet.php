<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'breed',
        'age',
        'user_id',
        'adopter_id'
    ];
}
