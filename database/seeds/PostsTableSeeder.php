<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//De esta forma se crean los post sin ningun tipo de relacion con la tabla tag /category.
       // factory(App\Post::class, 300)->create();


    	//De esta forma se crean los Posts fakes con la realcion entre los tags

    	factory(App\Post::class, 300)->create()->each(function(App\Post $post){

    		$post->tags()->attach([
    			rand(1, 5),
    			rand(6,14),
    			rand(15,20),
    		]);

    	});

    }
}
