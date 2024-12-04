<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('departamentos.index', [
            'departamentos' => Departamento::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|max:2|unique:departamentos,codigo',
            'denominacion' => 'required|string|max:255',
            'localidad' => 'nullable|string|max:255',
        ]);
        $departamento = Departamento::create($validated);
        session()->flash('exito', 'Departamento creado correctamente.');
        return redirect()->route('departamentos.show', $departamento);
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        return view('departamentos.show', [
            'departamento' => $departamento,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        return view('departamentos.edit', [
            'departamento' => $departamento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        $validated = $request->validate([
            'codigo' => [
                'required',
                'max:2',
                Rule::unique('departamentos')->ignore($departamento),
            ],
            'denominacion' => 'required|string|max:255',
            'localidad' => 'nullable|string|max:255',
        ]);
        // $departamento->codigo = $validated['codigo'];
        // $departamento->denominacion = $validated['denominacion'];
        // $departamento->localidad = $validated['localidad'];
        $departamento->fill($validated);
        $departamento->save();
        session()->flash('exito', 'Departamento modificado correctamente.');
        return redirect()->route('departamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamentos.index');
    }
}
