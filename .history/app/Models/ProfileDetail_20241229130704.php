<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileDetail extends Model
{
    protected $fillable = ['address', 'contact_number', 'date_of_birth'];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
