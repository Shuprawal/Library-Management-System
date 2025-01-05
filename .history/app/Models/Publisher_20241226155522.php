<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name'];

    public function publisher() {
        return $this->has(Book::class, 'publisherID','id');
    }
}
