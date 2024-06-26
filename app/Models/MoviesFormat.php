<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoviesFormat extends Model
{
    use HasFactory;
    
    // Define the table associated with the model
    protected $table = 'movies_formats';

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    
}