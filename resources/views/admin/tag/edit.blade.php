@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col-md-12">

			<h2 > Eitar etiqueta </h2>

			{!! Form::model([$tag, ['route'=>'tags.update',$tag->id],  'method' => 'PUT']) !!}

			@include('admin.tag.form')


			{!! Form::close() !!}

			</div>
	</div>
						    
			


@endsection