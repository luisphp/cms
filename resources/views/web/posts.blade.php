@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


	<div class="container">
		
		<div class="col-md-8 col-md-offset-2">


			<h2> Todos los post</h2>


		@foreach($posts as $post)
			
			<div class="panel panel-default">

				<div class="panel-heading">


					{{$post->name}}


				</div>
					<div class="panel-body">

						@if($post->file)


								<img src="{{$post->file}}" class="image-responsive">

							

						@endif	
						

							{{$post->excerpt}}



							
							<a href="#" class="pull-right">Leer más</a>

						</div>

						</div>




		@endforeach

		{{$posts->render()}}

		</div>

	</div>

@endsection