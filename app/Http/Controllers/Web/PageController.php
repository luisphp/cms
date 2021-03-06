<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Database\Eloquent\Builder;

class PageController extends Controller
{

	//Vista de todas las Entradas o Posts
    public function blog(){

    	$posts = Post::orderBy('id','DESC')->where('status', 'PUBLISHED')->paginate(3);


    	return view('web.posts', compact('posts'));
    }

    //Vista de la entrada filtrando por Slug
    public function post($slug){

    	$post = Post::where('slug', $slug)->first();


    	return view('web.post', compact('post'));
    }

    //Vista de entradas filtradas por Categorias
     public function category($slug){

    	$category = Category::where('slug', $slug)->pluck('id')->first();

    	$posts = Post::where('category_id',$category)->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3);


    	return view('web.posts', compact('posts'));
    }


    //Vista de entradas filtradas por Tags
    public function tag($slug){

    	

    	$posts = Post::whereHas('tags', function($query) use($slug){

    		$query->where('slug', $slug);
    	})->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3);


    	return view('web.posts', compact('posts'));
    }



}
