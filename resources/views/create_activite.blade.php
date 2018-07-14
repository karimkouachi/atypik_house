@extends("layout")

@section('content')

	@if (Session::has('message'))
	    <div class="alert alert-success">{{ Session::get('message') }}</div>
	@endif

	<h1>Ajouter une activité</h1>

	  @if ($errors->any())
	      <div>
	        @foreach ($errors->all() as $error)
	            <p class="alert alert-danger">{{ $error }}</p>
	        @endforeach
	      </div>
	  @endif

	{!! Form::open(array('route' => 'storeActivite', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
				<div class="form-group">
					{!! Form::label('libelle_activite', 'Nom :', ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('libelle_activite', null, ['class' => 'form-control', 'placeholder' => 'Restaurant']) !!}
					</div>
		  		</div>
			
				<div class="form-group">
					{!! Form::label('adresse_activite', 'Adresse :', ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('adresse_activite', null, ['class' => 'form-control', 'placeholder' => 'Oxford St']) !!}
					</div>
		  		</div>

				<div class="form-group">
					{!! Form::label('cp_activite', 'Code postal :', ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('cp_activite', null, ['class' => 'form-control', 'placeholder' => 'WR11 4']) !!}
					</div>
				</div>
			
				<div class="form-group">
					{!! Form::label('ville_activite', 'Ville :', ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('ville_activite', null, ['class' => 'form-control', 'placeholder' => 'London']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('pays_activite', 'Pays :', ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::text('pays_activite', null, ['class' => 'form-control', 'placeholder' => 'United Kingdom']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('descriptif_activite', 'Descriptif :', ['class' => 'col-lg-2 control-label']) !!}
					<div class="col-lg-10">
						{!! Form::textarea('descriptif_activite', null, ['class' => 'form-control', 'placeholder' => 'Restaurant 5 étoiles']) !!}
					</div>
		  		</div>

				<div class="form-group">
        			<div class="col-lg-10 col-lg-offset-2">
						{!! Form::submit("Ajouter", array('class' => 'btn btn-lg btn-success pull-right')) !!}
					</div>
      			</div>
			
	{!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
			$(".alert-success").delay(2000).fadeOut();
        });
    </script>
@endsection