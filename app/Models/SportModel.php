<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportModel extends Model
{
    use HasFactory;

    protected $table = "sports";

    // Corrected from "filltable" to "fillable"
    protected $fillable = [
        'name',
        'category',
    ];
}
