<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    /** @use HasFactory<\Database\Factories\DepartamentoFactory> */
    use HasFactory;

    protected $fillable = ['codigo', 'denominacion', 'localidad'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }

    public function articulos()
    {
        return $this->belongsToMany(Articulo::class);
    }
}
