@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col-md-12">

			<h2 > Ver Etiqueta </h2>

			<hr>

			<p><strong>Nombre </strong> <span class="pull-right">{{$tag->name}} </span></p>

			<hr>

			<p><strong>Slug </strong> <spanc class="pull-right"> {{$tag->slug}}  </span></p>
 


			</div>
	</div>
						    
			


@endsection