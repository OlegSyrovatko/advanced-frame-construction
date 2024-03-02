<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['title', 'description', 'area', 'price', 'works', 'other_works'];

    public function photos()
    {
        return $this->hasMany(HousePhoto::class);
    }

    public function coverPhoto()
    {
        return $this->photos()->where('is_cover', true)->first();
    }
}
