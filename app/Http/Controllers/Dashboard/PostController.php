<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
