<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;
    protected $table = 'administrativos';

    protected $fillable = [
        'usuario_id',
        'nombre',
        'cve_servidor',
        'adscrip',
        'telefono',
        'profesion',
     ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
