<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable=['user_id','rateable_id','rateable_type','rating'];

    public function user(){}
}
