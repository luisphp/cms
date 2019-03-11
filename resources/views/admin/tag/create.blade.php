@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col-md-12">

			<h2 > Crear etiqueta </h2>

			{!! Form::open(['route'=>'tags.store']) !!}

			@include('admin.tag.form')


			{!! Form::close() !!}

			</div>
	</div>
						    
			


@endsection