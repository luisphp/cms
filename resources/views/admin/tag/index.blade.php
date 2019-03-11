@extends('layouts.app')

@section('content')

		


	<div class="container">
		<div class="col-md-12">


			

		<h2> Etiquetas <span class="pull-right"> <a role="button" class="btn btn-primary float-right" href="{{ route('tags.create') }}"> Crear </a> </span> </h2>

				


		<table class="table table-responsive-md" style = "margin: 30px">
				  <thead>
				    <tr>
				      <th scope="col">id</th>
				      <th scope="col">Name</th>
				      <th scope="col">Slug</th>
				      <th scope="col">Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
 		<tbody>

		@foreach($tags as $tag)



						 
						    <tr>
						      
						      <td>{{$tag->id}}</td>
						      <td>{{$tag->name}}</td>
						      <td>{{$tag->slug}}</td>
						      <td><span class="badge badge-success">Active</span> </td>
						      <td>
						      	
						      	<div class="btn-group">
						      		<a href="{{route('tags.show',$tag->id)}}" class="btn btn-sm btn-light"> Ver </a>

						      		<a href="{{route('tags.edit',$tag->id)}}" class="btn btn-sm btn-primary"> Edit </a>
						      	    
									
									
									 {!! Form::open(['route' => ['tags.destroy', $tag->id],'method'=>'DELETE']) !!}

									 <button class="btn btn-sm btn-danger">Delete</button>

									 {!! Form::close() !!}

									</div>
								
								</td>

						    </tr>
						    
			

		@endforeach

			  </tbody>
			</table>

			{{$tags->render()}}

		</div>
	</div>
@endsection