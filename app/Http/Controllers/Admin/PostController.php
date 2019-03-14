<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
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
        $posts = Post::orderBy('id','DESC')->where('user_id',auth()->user()->id)->paginate(5);

        return view ('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','ASC')->pluck('name','id');

        $tags = Tag::orderBy('name','ASC')->get();


        return view ('admin.post.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {

        $post = Post::create($request->all());

        return redirect()->route('posts.edit', $post->id)->with('info', 'Post creado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);


        return view ('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

         $categories = Category::orderBy('name','ASC')->pluck('name','id');

        $tags = Tag::orderBy('name','ASC')->get();


        return view ('admin.post.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);

        $post->fill($request->all())->save();

        return redirect()->route('posts.edit', $post->id)->with('info', 'Post actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = Post::where('id', $id)->pluck('name');
        
        Post::find($id)->delete();

        return back()->with('info', 'Etiqueta: '. $name.' eliminada correctamente' );
        
    }
}
