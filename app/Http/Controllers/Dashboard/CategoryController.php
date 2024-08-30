<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\PutRequest;
use App\Http\Requests\category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // se hace una pagincacion usando el metodo de laravel "paginate"
        $categories = Category::paginate(2);
        return view('dashboard.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //Con el pluck solo se mandan las consultas de lo que se quiere, sin tanta data
        $category = new Category();

        // dd($categories);

        // dd($categories[0]->slug);
        return view('dashboard.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
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
        Category::create($request->validated());
        return to_route("category.index")->with('status', "Registro creado.");;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): View
    {
        return view("dashboard.category.show", compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
         //Con el pluck solo se mandan las consultas de lo que se quiere, sin tanta data
         $categories = Category::pluck('id', 'title');

         // dd($categories);
 
         // dd($categories[0]->slug);
         return view('dashboard.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category): RedirectResponse
    {
        //cuando se usa la flecha en vez de los dos puntos es por que es una instancia de clase
        // dd($request->validated());
        $category->update($request->validated());
       
        return to_route("category.index")->with('status', "Registro actualizado.");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route("category.index")->with('status', "Registro eliminado.");;
    }
}
