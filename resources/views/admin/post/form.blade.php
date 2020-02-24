
<div class="container">
<!-- Campo oculto el cual captura automaticamente el user_id del usuario que esta logeado--> 
{{ Form::hidden('user_id', auth()->user()->id) }}

<!-- Lista de Categorias -->

<div class="form-group">
	{{ Form::label('category_id', 'Categorias') }}
	{{ Form::select('category_id', $categories , null,['class' => 'form-control']) }}
</div>

<!-- Nombre del Post -->

<div class="form-group">
	{{ Form::label('name', 'Nombre del Post') }}
	{{ Form::text('name', null , ['class' => 'form-control', 'id'=>'name']) }}
</div>

<!-- Slug o URL amigable -->

<div class="form-group">
	{{ Form::label('slug', 'URL') }}
	{{ Form::text('slug', null , ['class' => 'form-control', 'id'=>'slug']) }}
</div>


<!-- Status  -->
<div class="form-group">
	{{ Form::label('status', 'Estado: ') }}
	<label>
	{{ Form::radio('status', 'PUBLISHED') }} PUBLICADO
	</label>
	<label>
	{{ Form::radio('status', 'DRAFT') }} BORRADOR
	</label>
</div>

<!-- Etiquetas -->
<div class="form-group">
	{{ Form::label('tag_id', 'Etiquetas: ') }}

	@foreach($tags as $tag)
	<label>
	{{ Form::radio('tags[]',  $tag->id) }} {{$tag->name}}
	</label>
	@endforeach
	
</div>

<!-- Extracto  -->
<div class="form-group">
	{{ Form::label('excerpt', 'Extracto del Post') }}
	{{ Form::textarea('excerpt', null , ['class' => 'form-control', 'id'=>'excerpt', 'rows'=>'2']) }}
</div>

<!-- Cuerpo del Post  -->
<div class="form-group">
	{{ Form::label('body', 'Cuerpo del Post') }}
	{{ Form::textarea('body', null , ['class' => 'form-control', 'id'=>'body', 'rows' => '4']) }}
</div>


<!-- Imagen -->
<div class="form-group">
	{{ Form::label('file', 'Imagen') }}
	{{ Form::file('file') }}
</div>


<!-- Boton para cargar información -->
<div>
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>


</div>

<!-- Script Jquery para generar de forma automatica y dinamica el Slug en base al nombre--> 

@section('scripts')

<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"> </script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"> </script>

<script>
	$(document).ready(function(){

		$("#name, #slug").stringToSlug({

			callback: function(text){
				$("#slug").val(text);
			}
		});
	});

	CKEDITOR.config.height= 200;
	CKEDITOR.config.width= 'auto';

	CKEDITOR.replace('body');

</script>

@endsection
