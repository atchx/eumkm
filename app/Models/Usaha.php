<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\Cloud;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gambarusaha()
    {
        return $this->hasMany(Gambarusaha::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
