@extends('layouts.app')

@section('content')

		


	<div class="container">
		<div class="col-md-12">


			

		<h2> Categorías <span class="pull-right"> <a role="button" class="btn btn-primary float-right" href="{{ route('categories.create') }}"> Crear </a> </span> </h2>

				


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

		@foreach($categories as $category)



						 
						    <tr>
						      
						      <td>{{$category->id}}</td>
						      <td>{{$category->name}}</td>
						      <td>{{$category->slug}}</td>
						      <td><span class="badge badge-success">Active</span> </td>
						      <td>
						      	
						      	<div class="btn-group">
						      		<a href="{{route('categories.show',$category->id)}}" class="btn btn-sm btn-light"> Ver </a>

						      		<a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-primary"> Edit </a>
						      	    
									
									
									 {!! Form::open(['route' => ['categories.destroy', $category->id],'method'=>'DELETE']) !!}

									 <button class="btn btn-sm btn-danger">Delete</button>

									 {!! Form::close() !!}

									</div>
								
								</td>

						    </tr>
						    
			

		@endforeach

			  </tbody>
			</table>

			{{$categories->render()}}

		</div>
	</div>
@endsection