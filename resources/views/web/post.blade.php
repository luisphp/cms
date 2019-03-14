@extends('layouts.app')

@section('content')

	<div class="container">
		
		<div class="col-md-12 col-md-offset-2">

			<h1> {{$post->name}} </h1>

			
			<div class="card" style="margin: 20px">

				<div class="card-head" style="margin: 20px">

					<strong> Categoría: </strong> 

								<a href="{{ route('category', $post->category->slug) }}" style="margin: 15px">  {{$post->category->name}} </a> 

								<hr>

							</div>				

						<div class="card-body">

							@if($post->file)

								<img src="{{$post->file}}" class="img-fluid">

							@endif	
						

								<p class="card-text text-justify" style="margin: 10px"> {{$post->excerpt}} </p>

								<hr>

								{!!  $post->body  !!}

					
								<hr>

								<strong> Etiquetas: </strong>

								@foreach($post->tags as $tag)

									<a href="{{ route('tag', $tag->slug) }}" style="margin: 15px;"> {{ $tag->name }} </a>

								@endforeach

						</div>

				</div>

		</div>

	</div>

@endsection