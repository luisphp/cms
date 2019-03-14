@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col-md-12">

			<h2 > Crear Post </h2>

			{!! Form::open(['route'=>'posts.store', 'files' => true]) !!}

			@include('admin.post.form')


			{!! Form::close() !!}

			</div>
	</div>
						    
			


@endsection