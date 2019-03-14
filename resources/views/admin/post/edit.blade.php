@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col-md-12">

			<h2 > Editar Post </h2>

			 

			{!! Form::model($post, ['route'=>['posts.update',$post->id],  'method' => 'PUT']) !!}

			@include('admin.post.form')


			{!! Form::close() !!}
			

			</div>
	</div>
						    
			


@endsection