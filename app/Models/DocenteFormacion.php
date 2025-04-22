<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocenteFormacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'docente_id',
        'nivel',
        'institucion',
        'tipo',
        'carrera',
        'especialidad',
        'universidad',
        'amo_graduacion',
        'documento',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

}
