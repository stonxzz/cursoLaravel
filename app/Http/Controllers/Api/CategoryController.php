<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Response es una funcion de las apis, y como una api no devuelve vista, siempre devuelve un json
        return response()->json(Category::paginate(10));
    }

    public function all()
    {
        //Response es una funcion de las apis, y como una api no devuelve vista, siempre devuelve un json
        return response()->json(Category::get());
    }

    public function slug($slug) {
        //Se pone el nombre de la relacion que se hizo en el modelo para traer las categorias
        $category = Category::where("slug",$slug)->FirstOrFail();
        return response()->json($category);
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("Deleted");
    }

    public function posts(Category $category){

        //Forma con queryBuilder, es decir nosotros armamos la query
        //"select `posts`.*, `categories`.`title` as `category` from `posts` inner join `categories` 
        //on `categories`.`id` = `posts`.`category_id` where `categories`.`id` = ?"
        // $posts = Post::join('categories',"categories.id", "=","posts.category_id")
        // ->select("posts.*", "categories.title as category")
        // ->where("categories.id", $category->id)
        // ->get();

        //Ahora usando eloquent
        $posts = Post::with("category")//Se pone el nombre de la relacion que se definio en el modelo
        ->where("category_id", $category->id)
        ->get();
        
        return response()->json($posts);
    }
}
