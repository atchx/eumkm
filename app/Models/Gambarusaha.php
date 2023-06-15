<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambarusaha extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function usaha()
    {
        return $this->belongsTo(Usaha::class);
    }
}
