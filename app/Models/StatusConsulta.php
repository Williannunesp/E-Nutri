<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusConsulta extends Model
{
    use HasFactory;

    public function Agenda(){
        return $this->hasMany(Agendamentopc::class);
    }

    public function Retorno(){
        return $this->hasMany(Retorno::class);
    }
}

