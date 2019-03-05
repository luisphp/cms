@extends('layouts.app')

@section('content')



	<div class="container">
		
		<div class="col-md-12 col-md-offset-2">


			<h2> Todos los post</h2>


		@foreach($posts as $post)
			
			<div class="card">

				<div class="card_header">

					<h2 class="card-head">  {{$post->name}} </h2>

				</div>

					<div class="card-body">

						@if($post->file)


								<img src="{{$post->file}}" class="image-responsive">

							

						@endif	
						

							<p class="card-text"> {{$post->excerpt}} </p>



							
							<a href="#" class="card-link text-right">Leer más</a>

						</div>

						</div>




		@endforeach

		{{$posts->render()}}

		</div>

	</div>

@endsection