<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['title', 'works', 'price', 'other_works',  'description', 'cover'];
    public function photos()
    {
        return $this->hasMany(ListingPhoto::class);
    }
}
