<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agendamentopc extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'telefone',
        'data',
        'hora',
        'paciente_id',
        'status_id',
        'descriçãofichapc',
        'fichapc',
        'descriçãoantro',
        'antropometrica',
        'descriçãodieta',
        'dieta',
        'username'

    ];

    public function status(){
        return $this->belongsTo(StatusConsulta::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
