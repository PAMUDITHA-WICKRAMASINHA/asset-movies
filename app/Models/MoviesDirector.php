<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviesDirector extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'movies_directors';
}