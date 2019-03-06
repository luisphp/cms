@extends('layouts.app')

@section('content')


	<div class="container">
		<div class="col-md-12">

		<h2 > Etiquetas </h2>


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
						      		
						      	    <button type="button" class="btn btn-sm btn-primary">Edit</button>
									<button type="button" class="btn btn-sm btn-success">Active</button>
									<button type="button" class="btn btn-sm btn-warning">Deactivate</button>
									<button type="button" class="btn btn-sm btn-danger">Delete</button>
									

								</td>

						    </tr>
						    
			

		@endforeach

			  </tbody>
			</table>

			{{$tags->render()}}

		</div>
	</div>
@endsection