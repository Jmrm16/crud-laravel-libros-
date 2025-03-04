<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los libros de la base de datos
        $libros = Libro::all();

        // Retornar la vista con los libros
        return view('dashboard', compact('libros'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

          // Retornar la vista con los libros
          return view('libros.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validación de los datos del formulario
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cantidad' => 'required|integer',
        ]);

        // Crear el libro en la base de datos
        Libro::create([
            'name' => $validated['name'],
            'cantidad' => $validated['cantidad'],
        ]);

        

        // Redirigir de vuelta al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Libro creado exitosamente.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cantidad' => 'required|integer',
        ]);
    
        $libro->update([
            'name' => $validated['name'],
            'cantidad' => $validated['cantidad'],
        ]);
    
          // Redirigir de vuelta al dashboard con un mensaje de éxito
          return redirect()->route('dashboard')->with('success', 'Libro creado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
    
        return redirect()->route('dashboard')->with('success', 'Libro eliminado exitosamente.');
    }
}
