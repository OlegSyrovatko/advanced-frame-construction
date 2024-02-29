<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingPhoto extends Model
{
    protected $fillable = ['photo_path', 'is_cover'];

    public function listing()
    {
        return $this->belongsTo(House::class);
    }
}
