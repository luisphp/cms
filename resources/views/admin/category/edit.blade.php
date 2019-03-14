@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col-md-12">

			<h2 > Editar Categoria </h2>

			 

			{!! Form::model($category, ['route'=>['categories.update',$category->id],  'method' => 'PUT']) !!}

			@include('admin.category.form')


			{!! Form::close() !!}
			

			</div>
	</div>
						    
			


@endsection