<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::with('category')->paginate(10));
    }

    public function all()
    {
        return response()->json(Post::get());
    }

    // public function slug($slug) {
    //     $post = Post::with('category')->where("slug", $slug)->firstOrFail();
    //     return response()->json($post);
    // }

    //Ahora se hace mediante la injeccion del post
    public function slug(Post $post)
    {
        return response()->json($post);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        return response()->json(Post::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(PutRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }

    public function upload(Request $request, Post $post)
    {
        //cuando se usa la flecha en vez de los dos puntos es por que es una instancia de clase
        // dd($request->validated());

        // // dd($request->image);
        // dd($request->validated()['image']->hashName());

        $data['image'] = $filename = $request['image']->hashName();
        //Se indica que la imagen se estar moviendo a ese disco (direccion)
        $request->image->move(public_path("image"), $filename);
        
        $post->update($data);

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('Deleted');
    }
}
