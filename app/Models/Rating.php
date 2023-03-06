<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Rating extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'grades';

    public function comments(){
        return $this->belongsTo(Movie::class,'_id');
    }
}
