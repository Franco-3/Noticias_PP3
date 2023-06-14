<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\NoticiaFactory;
use App\Models\Noticia;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    public function index(){
        //$noticias = NoticiaFactory::generarNoticias(30);
        //$noticias = Noticia::all();
        $noticias = Noticia::orderBy('created_at', 'desc')->with('creadaPor')->paginate(6);
        $categorias = Categoria::pluck('name', 'id');
        return view('backend.noticias.index', compact('noticias'), compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $categorias = Categoria::pluck('name', 'id');
        return view('backend.noticias.create', compact('users'), compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $noticia = Noticia::findOrFail($id);
        $validatedData = $request->validate(
            [
                'titulo' => 'required|unique:noticias,titulo,' . $id,
                'cuerpo' => 'required',
                'autor' => 'required',
                'categoria' => 'required',
                'image' => 'image|max:2048'
            ]
        );
        
        if ($request->hasFile('imagen')) {
            $archivoImagen = $request->file('imagen');
            $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
            $savedPath = str_replace("public/", "", $path);
            $noticia->imagen = $savedPath;
        }
        
        $noticia->update($validatedData);
        $noticia->autor = $request->input('autor');
        $noticia->save();

        $request->session()->flash('status', 'Se guardó correctamente la noticia ' . $noticia->titulo);
        return redirect()->route('noticias.edit', $noticia->id);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'titulo' => 'required|unique:noticias',
                'cuerpo' => 'required',
                //'autor' => 'required',
                'categoria' => 'required',
                'image' => 'image|max:2048'
            ]
        );

        $noticia = new Noticia();
        $noticia->titulo = $request->input('titulo');
        $noticia->cuerpo = $request->input('cuerpo');
        $archivoImagen = $request->file('imagen');
        
        //$noticia->autor = $request->input('autor');
        
        $noticia->autor = Auth::user()->id;
        $noticia->categoria = $request->input('categoria');

        $noticia->save();
        //php artisan storage:link
        if ($request->hasFile('imagen')) {
            $archivoImagen = $request->file('imagen');
            $path = $archivoImagen->storeAs('public/noticias/' . $noticia->id, $archivoImagen->getClientOriginalName());
            $savedPath = str_replace("public/", "", $path);
            $noticia->imagen = $savedPath;
            $noticia->save();
        }

        $request->session()->flash('status', 'Se guardó correctamente la noticia ' . $noticia->titulo);
        return redirect()->route('noticias.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('backend.noticias.show', compact('noticia'));
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $noticia = Noticia::findOrFail($id);
        $users = User::pluck('name', 'id');
        return view('backend.noticias.edit', compact('noticia', 'users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();
        return redirect()->route('noticias.index');
    }

    public function porAutor($autor)
    {
        $noticias = Noticia::where('autor', $autor)->with('creadaPor')->paginate(10);
        return view('backend.noticias.index', ['noticias' => $noticias]);
    }

    public function porCategoria($categoria)
    {
        $noticias = Noticia::where('categoria', $categoria)->with('enCategoria')->paginate(10);
        return view('backend.noticias.index', ['noticias' => $noticias]);
    }
}
