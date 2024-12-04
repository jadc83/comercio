<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    /** @use HasFactory<\Database\Factories\ArticuloFactory> */
    use HasFactory;

    public $fillable = ['codigo', 'descripcion', 'precio'];

    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }

    public function facturas()
    {
        return $this->belongsToMany(Factura::class)
            ->withPivot('cantidad');
    }
}
