<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Storage;

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

        //Guardamos el Post
        $post = Post::create($request->all());


        //Verificamos que tenemos una imagen
        if($request->file('file')){


            //En caso  de tenerla la guardamos en la clase Storage en la carpeta public en la carpeta image.
            $path = Storage::disk('public')->put('image',$request->file('file'));

            //Actualizamos el Post que acabamos de crear
            $post->fill(['file' => asset($path)])->save();

        }

        // Aqui añadimos las etiquetas, para la creacion (como es este caso podemos usar "attach" o "sync")
        $post->tags()->attach($request->get('tags'));

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

        //En esta seccion verificamos si el post que desea editar el usuario pertene a el de lo contrario no dejamos que lo edite
        $this->authorize('pass',$post);


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

        //En esta seccion verificamos si el post que desea editar el usuario pertene a el de lo contrario no dejamos que lo edite

        $this->authorize('pass',$post);

        //De ser positivo esto ultimo realiamos las otras consultas de lo contrario mostramos un mensaje que diga no estas autorizado para realizar esta acción.

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

        //Validacion del metodo update con respecto a la politica
        $this->authorize('pass',$post);


        $post->fill($request->all())->save();

           //Verificamos que tenemos una imagen
        if($request->file('file')){


            //En caso  de tenerla la guardamos en la clase Storage en la carpeta public en la carpeta image.
            $path = Storage::disk('public')->put('image',$request->file('file'));

            //Actualizamos el Post que acabamos de crear
            $post->fill(['file' => asset($path)])->save();

        }

        // Aqui añadimos las etiquetas, para la creacion (como es este caso podemos usar "attach" o "sync")
        $post->tags()->sync($request->get('tags'));

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
        $post = Post::find($id);

        //Validacion del metodo update con respecto a la politica
        $this->authorize('pass',$post);

        $name = Post::where('id', $id)->pluck('name');
        
        Post::find($id)->delete();

        return back()->with('info', 'Etiqueta: '. $name.' eliminada correctamente' );
        
    }
}
