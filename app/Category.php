<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    	//1 Categoria tiene N cantidad de Posts
    public function posts(){
    	return $this->hasMany(Post::class);
    }



    //Campos protegidos
    protected $fillable [

    	'name', 'slug', 'body'
    ];
}
