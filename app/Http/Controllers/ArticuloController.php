<?php

namespace App\Http\Controllers;

use App\Generico\Carrito;
use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articulos.index', [
            'articulos' => Articulo::all(),
            'carrito' => Carrito::carrito(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|integer|unique:articulos,codigo',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|between:0,9999.99',
        ], [
            'codigo.required' => 'El codigo es obligatorio',
            'codigo.decimal' => 'La longitud del codigo no puede ser mas de seis cifras',
            'codigo.unique' => 'El codigo debe de ser unico',
            'descripcion.required' => 'La descripcion es obligatoria.',
            'descripcion.unique' => 'La descripcion introducida ya existe en la base de datos',
            'descripcion.max' => 'La descripcion no puede tener más de 255 caracteres.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'precio.between' => 'El precio debe estar entre 0 y 9999.99.',
        ]);

        $articulo = Articulo::create($validated);
        session()->flash('exito', 'Producto creado correctamente.');
        return redirect()->route('articulos.index', $articulo);
    }


    /**
     * Display the specified resource.
     */
    public function show(Articulo $articulo)
    {
        return view('articulos.show', ['articulo' => $articulo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', ['articulo' => $articulo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articulo $articulo)
    {
        $validated = $request->validate([
            'codigo' => 'required|integer|unique:articulos,codigo,' . $articulo->id,
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|between:0,9999.99',
        ], [
            'codigo.required' => 'El código es obligatorio.',
            'codigo.integer' => 'El código debe ser un número entero.',
            'codigo.unique' => 'El código debe ser único.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.max' => 'La descripción no puede tener más de 255 caracteres.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número válido.',
            'precio.between' => 'El precio debe estar entre 0 y 9999.99.',
        ]);

        $articulo->update($validated);
        session()->flash('exito', 'Artículo actualizado correctamente.');
        return redirect()->route('articulos.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index');
    }
}
