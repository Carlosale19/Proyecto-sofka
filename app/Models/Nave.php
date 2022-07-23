<?php

namespace App\Models;

use App\Models\Lanzadora;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nave extends Model
{
    use HasFactory;

    public function NaveLanzadora(){
        return $this->hasOne(Lanzadora::class);
    }
}
