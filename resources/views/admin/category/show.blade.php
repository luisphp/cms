@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col-md-12">

			<h2 > Detalles de la Categoria </h2>

			<hr>

			<p><strong>Nombre </strong> <span class="pull-right">{{$category->name}} </span></p>

			<hr>

			<p><strong>Slug </strong> <spanc class="pull-right"> {{$category->slug}}  </span></p>
 


			</div>
	</div>
						    
			


@endsection