<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\CategoriaFactory;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('backend.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::pluck('name', 'id');
        return view('backend.categorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $categoria = Categoria::findOrFail($id);
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
            ]
        );

        $categoria = new Categoria();
        $categoria->name = $request->input('name');
        $categoria->description = $request->input('description');

        $categoria->update($validatedData);
        $categoria->save();

        $request->session()->flash('status', 'Se guardó correctamente la categoria ' . $categoria->name);
        return redirect()->route('categorias.index', $categoria->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('backend.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        //$users = User::pluck('name', 'id');
        //return view('backend.categorias.edit', compact('noticia', 'users'));
        return view('backend.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
            ]
        );
        
        
        $categoria->update($validatedData);
        $categoria->name = $request->input('name');
        $categoria->description = $request->input('description');
        $categoria->save();

        $request->session()->flash('status', 'Se guardó correctamente la noticia ' . $categoria->titulo);
        return redirect()->route('categorias.index', $categoria->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
    
}
