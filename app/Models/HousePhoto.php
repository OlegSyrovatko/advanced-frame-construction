<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousePhoto extends Model
{
    protected $fillable = ['photo_path', 'is_cover', 'width'];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
