<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
        "title",
        "ingredients",
        "instructions",
        "image",
    ];
}
