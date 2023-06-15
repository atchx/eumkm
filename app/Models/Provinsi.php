<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // public $timestamps = false;

    public function kabkot()
    {
        return $this->hasMany(Kabkot::class);
    }
}
