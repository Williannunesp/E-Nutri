<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "datanasc",
        "email",
        "cpf",
        "profissao",
        "celular",
        "telres",
        "rua",
        "numero",
        "bairro",
        "cidade",
        "uf",
        "estci_id",
        "sexo_id",
    ];

    public function estadocivil(){
        return $this->belongsTo(Estadocivil::class);
    }

    public function profissao(){
        return $this->belongsTo(Profissao::class);
    }

    public function enndereco(){
        return $this->belongsTo(Endereco::class);
    }

    public function sexo(){
        return $this->belongsTo(Sexo::class);
    }

    public function agendamentopc(){
        return $this->hasMany(Agendamentopc::class);
    }

}
