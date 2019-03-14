<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{

    //Para indicarle al sistema que para acceder a este controlador el usuario debe estar logeado usamos la siguiente linea de codigo:


     public function __construct()
    {
        $this->middleware('auth');

    }

    //En el caso de que solo debamos proteger el acceso a una function/metodo debemos incluir  $this->middleware('auth');  al principio del metodo o funcion.



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->paginate(5);

        return view ('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view ('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {

        $category = Category::create($request->all());

        return redirect()->route('categories.edit', $category->id)->with('info', 'Categoria creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);


        return view ('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);


        return view ('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::find($id);

        $category->fill($request->all())->save();

        return redirect()->route('categories.edit', $category->id)->with('info', 'Categoria actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = Category::where('id', $id)->pluck('name');
        
        Category::find($id)->delete();

        return back()->with('info', 'Etiqueta: '. $name.' eliminada correctamente' );
        
    }
}