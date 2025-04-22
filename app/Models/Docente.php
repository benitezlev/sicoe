<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'nombre',
        'cve_servidor',
        'adscrip',
        'telefono',
        'profesion',
        'foto',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function usuario()
        {
            return $this->belongsTo(User::class);
        }

    public function formacion()
        {
            return $this->hasMany(DocenteFormacion::class);

        }

}
