@extends('layouts.app')

@section('content')

	<div class="container">
		
		<div class="col-md-12 col-md-offset-2">

			<h2> Todos los post</h2>

		@foreach($posts as $post)
			
			<div class="card" style="margin: 20px">

				<div class="card_header">

					<h2 class="card-head" style="margin: 15px">  {{$post->name}} </h2>

				</div>

						<div class="card-body">

							@if($post->file)


								<img src="{{$post->file}}" class="img-fluid">

							@endif	
						

								<p class="card-text text-justify" style="margin: 10px"> {{$post->excerpt}} </p>

								<a href="{{ route('post', $post->slug) }}" class="card-link text-right">Leer más</a>

						</div>

				</div>

		@endforeach

		{{$posts->render()}}

		</div>

	</div>

@endsection