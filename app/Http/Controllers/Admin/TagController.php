<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Http\Request\TagStoreRequest;
use App\Http\Request\TagUpdateRequest;

class TagController extends Controller
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
        $tags = Tag::orderBy('id','DESC')->paginate(5);

        return view ('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view ('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {

        $tag = Tag::create($request->all());

        return redirect()->route('tag.edit', $tag->id)->with('info', 'Etiqueta creada exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);


        return view ('admin.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);


        return view ('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        $tag = Tag::find($id);

        $tag->fill($request->all())->save();

        return redirect()->route('tag.edit', $tag->id)->with('info', 'Etiqueta actualizada exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();

        return back()->with('info', 'Etiqueta eliminada correctamente');
        
    }
}
