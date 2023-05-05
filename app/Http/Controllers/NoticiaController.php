<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\NoticiaFactory;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index(){
        //$noticias = NoticiaFactory::generarNoticias(30);
        $noticias = Noticia::all();
        return view('backend.noticias.index', compact('noticias'));
    }

    public function show($id){
        $noticia = (object) array(
            "titulo" => "What is Lorem Ipsum?",
            "cuerpo" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit repellendus corporis accusamus quaerat in! Tempore temporibus nam soluta aperiam cumque, quis praesentium vero, consectetur officiis deserunt magni ipsum reprehenderit quae!",
            "imagen" => "https://th.bing.com/th/id/OIP.nfMLArFatrmul2DtPs3LJgHaFY?w=244&h=180&c=7&r=0&o=5&pid=1.7",
            "id" => $id,

        );
        return view('backend.noticias.show', compact('noticia'));
    }
}
