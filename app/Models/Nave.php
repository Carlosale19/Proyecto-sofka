<?php

namespace App\Models;

use App\Models\Lanzadora;
use App\Models\Tripulada;
use App\Models\NoTripulada;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nave extends Model
{
    use HasFactory;

    public function NaveLanzadora(){
        return $this->hasOne(Lanzadora::class);
    }

    public function NaveNoTripulada(){
        return $this->hasOne(NoTripulada::class);
    }

    public function NaveTripulada(){
        return $this->hasOne(Tripulada::class);
    }
}
