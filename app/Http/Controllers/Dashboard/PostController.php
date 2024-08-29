<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // se hace una pagincacion usando el metodo de laravel "paginate"
        $posts = Post::paginate(2);
        return view('dashboard.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Con el pluck solo se mandan las consultas de lo que se quiere, sin tanta data
        $categories = Category::pluck('id', 'title');

        // dd($categories);

        // dd($categories[0]->slug);
        echo view('dashboard.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dd($request->all());

        

        // dd($validated);
        // $validate = Validator::make($request->all(),StoreRequest::myRules());
        // dd($validate->errors());
        // $data = $request->validated();
        // //Con la funcion slug, genera un url automaticamente en base al titulo
        // $data['slug'] = Str::slug($data['title']);

        // dd($data);
        //Cuando se usan los dos puntos es por que la clase se esta usando directamente
        Post::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
         //Con el pluck solo se mandan las consultas de lo que se quiere, sin tanta data
         $categories = Category::pluck('id', 'title');

         // dd($categories);
 
         // dd($categories[0]->slug);
         return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        //cuando se usa la flecha en vez de los dos puntos es por que es una instancia de clase
        // dd($request->validated());
        $post->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        echo "destroy";
    }
}
