<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	//Pertenece a muchas etiquetas
    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }


    //pertenece a 1 usuario
    public function user(){

    	return $this->belongsTo(User::class);
    }

    //Pertence a 1 categoria
    public function category(){

    	return $this->belongsTo(Category::class)
    }

    //Campos protegidos
    protected $fillable [

    	'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'
    ];
}
