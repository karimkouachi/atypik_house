@extends("layout")

@section('content')

	<h1>Modifier un habitat</h1>

	  @if ($errors->any())
	      <div>
	        @foreach ($errors->all() as $error)
	            <p class="alert alert-danger">{{ $error }}</p>
	        @endforeach
	      </div>
	  @endif

	{{ Form::model($habitat, array('route' => array('updateHabitat', $habitat->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{!! Form::label('nom_habitat', "Nom de l'habitat:", ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('nom_habitat', null, ['class' => 'form-control', 'placeholder' => 'Cabane dans un arbre']) !!}
			</div>
		</div>

    	<div class="form-group">
        	{!! Form::label('categorie', 'Categorie : ', ['class' => 'col-lg-2 control-label']) !!}
        	<div class="col-lg-10">
          		{!! Form::select('categorie', $categories, $habitat->categorie_id, ['class' => 'form-control' ]) !!}
        	</div>
     	</div>

		<div class="form-group">
			{!! Form::label('capacite_habitat', "Capacite de l'habitat:", ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('capacite_habitat', null, ['class' => 'form-control', 'placeholder' => '2']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('prix_habitat', "Prix de habitat:", ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('prix_habitat', null, ['class' => 'form-control', 'placeholder' => '100,00']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('adresse_habitat', "Adresse de habitat:", ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('adresse_habitat', null, ['class' => 'form-control', 'placeholder' => '1 rue de paris']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('cp_habitat', 'Code postal:', ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('cp_habitat', null, ['class' => 'form-control', 'placeholder' => '75000']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('ville_habitat', 'Ville:', ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('ville_habitat', null, ['class' => 'form-control', 'placeholder' => 'Paris']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('pays_habitat', 'Pays:', ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('pays_habitat', null, ['class' => 'form-control', 'placeholder' => 'France']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('num_habitat', 'Téléphone:', ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('num_habitat', null, ['class' => 'form-control', 'placeholder' => '01 00 00 00 00']) !!}
			</div>
		</div>

		<div class="form-group">
			{!! Form::label('photo_habitat', 'Photo:', ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('photo_habitat', null, ['class' => 'form-control', 'placeholder' => 'photo.jpg']) !!}
			</div>
		</div>
		
		<div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          {!! Form::submit('Modifier', array('class' => 'btn btn-lg btn-success pull-right')) !!}
        </div>
    </div>
	{!! Form::close() !!}

@endsection