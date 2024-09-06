<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Lo que hace eloquent con where es que el  primer valor es un atributo de la tabla del modelo
        //busca que sea igual al segundo parametro que se manda y trae esos datos, y el paginate los pagina
        $posts = Post::where("posted", "yes")->paginate(2);
        return view("web.blog.index",compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("web.blog.show", compact('post'));        
    }

    
}
