<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    /** @use HasFactory<\Database\Factories\EmpleadoFactory> */
    use HasFactory;

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
