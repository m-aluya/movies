<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Movie extends Model
{
    //use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'movies';


    public function rating(){
        return $this->hasMany(Rating::class, 'movie_id');
    }
}
