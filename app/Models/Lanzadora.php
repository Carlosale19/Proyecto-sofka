<?php

namespace App\Models;

use App\Models\Nave;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lanzadora extends Model
{
    use HasFactory;

    public function nave(){
        return $this->belongsTo(Nave::class);
    }
}
