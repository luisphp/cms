@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col-md-12">

			<h2 > Detalles del Post </h2>

			<hr>

			<p><strong>Nombre </strong> <span class="pull-right">{{$post->name}} </span></p>

			<hr>
			<p><strong>Slug </strong> <span class="pull-right">{{$post->slug}} </span></p>

			<hr>
			<p><strong>Extracto </strong> <span class="pull-right">{{$post->excerpt}} </span></p>

			<hr>
			<p><strong>Cuerpo </strong> <span class="pull-right">{{$post->body}} </span></p>

			<hr>
			<p><strong>Status </strong> <span class="pull-right">{{$post->status}} </span></p>

			<hr>
			<p><strong>Imagen </strong> <span class="pull-right">{{$post->file}} </span></p>

			<hr>
			<p><strong>Creado el</strong> <span class="pull-right">{{$post->created_at}} </span></p>

			<hr>
			<p><strong>Actualizado el </strong> <span class="pull-right">{{$post->updated_at}} </span></p>




			</div>
	</div>
						    
			


@endsection