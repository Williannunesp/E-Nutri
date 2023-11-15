<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retorno extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "telefone",
        "data",
        "hora",
        "status_id",
        "paciente_id"
    ];

    public function status(){
        return $this->belongsTo(StatusConsulta::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
