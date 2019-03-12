
<div class="form-group">
	{{ Form::label('name', 'Nombre de la etiqueta') }}
	{{ Form::text('name', null, ['class' => 'form-control', 'id'=>'name']) }}
</div>

<div class="form-group">
	{{ Form::label('slug', 'URL') }}
	{{ Form::text('slug', null, ['class' => 'form-control', 'id'=>'slug']) }}
</div>


<div>
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
<scripts src="{{ asset('vendor/StringToSlug/jquery.stringToSlug.min.js') }}"> </scripts>

<script>
	$(document).ready(function(){

		$("#name,#slug").stringToSlug({

			callback: function(text){
				$("#slug").val(text);
			}
		})
	})

</script>
@endsection
