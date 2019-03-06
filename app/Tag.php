<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
        	//Una etiqueta puede tener muchos posts
    public function posts(){
    	return $this->belongsToMany(Post::class);
    }



    //Campos protegidos
    protected $fillable = [

    	'name', 'slug',
    ];
    
}
