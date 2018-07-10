@extends("layout")

@section('content')

	<h1>Modifier les habitats</h1>

	@if ($errors->any())
      <div>
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
      </div>
  	@endif

		
	{{ Form::model(null, array('route' => array('updateHabitatsGerant'), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
		<div class="form-group">
  			{!! Form::label('categorie', "Catégorie:", ['class' => 'col-lg-2 control-label']) !!}
  			<div class="col-lg-10">
  				<select id="categorie" name="categorie" class="form-control">
		            @foreach($categories as $categorie)
		            <option value="<?php echo htmlspecialchars($categorie['libelle_categorie']); ?>">
		                {{ $categorie['libelle_categorie'] }}
		            </option>
		            @endforeach
		          </select>
  				<!-- {!! Form::select('categorie', ['text' => 'Text', 'bollean' => 'Boolean'], null, ['class' => 'form-control']) !!} -->
  			</div>
  		</div>

		<div class="form-group">
  			{!! Form::label('nom', "Nom:", ['class' => 'col-lg-2 control-label']) !!}
  			<div class="col-lg-10">
  				{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'nom_habitat']) !!}
  			</div>
  		</div>

  		<div class="form-group">
  			{!! Form::label('type', "Type:", ['class' => 'col-lg-2 control-label']) !!}
  			<div class="col-lg-10">
  				{!! Form::select('type', ['text' => 'Text', 'bollean' => 'Boolean'], null, ['class' => 'form-control']) !!}
  			</div>
  		</div>

  		<div class="form-group">
	        <div class="col-lg-10 col-lg-offset-2">
	          {!! Form::submit('Modifier', array('class' => 'btn btn-lg btn-success pull-right')) !!}
	        </div>
	    </div>
	{!! Form::close() !!}

@endsection