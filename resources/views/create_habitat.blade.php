@extends("layout")

@section('content')
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Ajouter une activité</h4>
          </div>
          <div class="modal-body">

            <div class="row">
              <div class="col-md-4">.col-md-4</div>
              <div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>
            </div>

            <div class="row">
              <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
              <div class="col-md-2 col-md-offset-4">.col-md-2 .col-md-offset-4</div>
            </div>

            <div class="row">
              <div class="col-sm-9">
                Level 1: .col-sm-9
                <div class="row">
                  <div class="col-xs-8 col-sm-6">
                    Level 2: .col-xs-8 .col-sm-6
                  </div>
                  <div class="col-xs-4 col-sm-6">
                    Level 2: .col-xs-4 .col-sm-6
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button id="btnPasserActivite" type="button" class="btn btn-default" data-dismiss="modal">Passer</button>
            <button id="btnAjoutActivite" type="button" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </div>
    </div>

	<h1>Créer un habitat</h1>

  @if ($errors->any())
      <div>
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
      </div>
  @endif

  {!! Form::open(array('route' => 'storeHabitat', 'method' => 'POST', 'class' => 'form-horizontal')) !!}	
  		<div class="form-group">
  			{!! Form::label('nom_habitat', "Nom de l'habitat:", ['class' => 'col-lg-2 control-label']) !!}
  			<div class="col-lg-10">
  				{!! Form::text('nom_habitat', null, ['class' => 'form-control', 'placeholder' => 'Cabane dans un arbre']) !!}
  			</div>
  		</div>

      <div class="form-group">
        {!! Form::label('categorie', 'Categorie : ', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
          {!! Form::select('categorie', $categories, null, ['class' => 'form-control' ]) !!}
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

      <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
  		
			<div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          {!! Form::submit('Créer', array('class' => 'btn btn-lg btn-success pull-right')) !!}
        </div>
      </div>
  {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript">
      /*$.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
      });*/

      $(document).ready(function() {

          /*$(".btnCreerHabitat").click(function(e){
              jQuery('.alert-danger').hide();
              jQuery('.alert-error').remove();
              e.preventDefault();

              var url = route('postHabitat');

              var nom_habitat = $('#nom_habitat').val();
              var categorie = $('#categorie').val();
              var nombre_habitat = $('#nombre_habitat').val();
              var prix_habitat = $('#prix_habitat').val();
              var adresse_habitat = $('#adresse_habitat').val();
              var cp_habitat = $('#cp_habitat').val();
              var ville_habitat = $('#ville_habitat').val();
              var pays_habitat = $('#pays_habitat').val();
              var num_habitat = $('#num_habitat').val();
              var photo_habitat = $('#photo_habitat').val();

              var inputs = [nom_habitat, categorie, nombre_habitat, prix_habitat, adresse_habitat, cp_habitat, ville_habitat, pays_habitat, num_habitat, photo_habitat];
            
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  contentType: "application/json; charset=utf-8",
                  url: url,
                  data: {inputs: inputs},
                  dataType: "json",                 
              })
              .done(function(data){
                      alert(data);console.log(data); 
                      jQuery.each(data.errors, function(key, value){
                          jQuery('.alert-danger').show();
                          jQuery('.alert-danger').append('<p class="alert-error">'+value+'</p>');
                      });
                      if(data.success){
                          $("#modal").modal();
                      }
              })
              .fail(function(data) {
                  alert(data);
              });                
          });*/
      });
    </script>
@endsection
