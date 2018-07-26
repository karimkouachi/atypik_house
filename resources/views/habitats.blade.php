@extends("layout")

@section('content')

  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

  {!! Form::open(array('route' => 'searchHabitat', 'method' => 'POST', 'class' => 'form-horizontal')) !!}  
      <div class="form-group">
        {!! Form::label('categorie', "Catégorie :", ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
          {!! Form::select('categorie', $categories, null, ['class' => 'form-control selectpicker', 'id' => 'categorie', 'placeholder' => 'Choisissez une catégorie']) !!}
        </div>
      </div> 

      <!-- <div class="form-group">
        {!! Form::label('ville_habitat', 'Ville:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
          {!! Form::text('ville_habitat', null, ['class' => 'form-control', 'placeholder' => 'Paris']) !!}
        </div>
      </div> -->
      
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          {!! Form::submit('Rechercher', array('class' => 'btn btn-lg btn-success pull-right', 'id' => 'btnRechercheForm')) !!}
        </div>
      </div>
  {!! Form::close() !!}

  <div class="row" id="rowBtnRecherchePhrase">
    <div class="form-group  col-lg-8 col-lg-offset-2">
      <div class="input-group input-group-lg">
        <input id="recherche" type="text" class="form-control" placeholder="Recherche...">
        <span class="input-group-btn">
          <button id="btnRecherchePhrase" class="btn btn-default" type="button">Rechercher</button>
        </span>
      </div>
    </div>
  </div>

  <div id="containerHabitats" class="container">
    @foreach ($habitats as $habitat)      
      <div class="jumbotron">
    		<h1>{{$habitat->nom_habitat}}</h1>

    		<div>
    			<p>Capacité de l'habitat: {{$habitat->capacite_habitat}}</p>
    			<p>Prix de l'habitat: {{$habitat->prix_habitat}}</p>
    			<p>Code postal: {{$habitat->cp_habitat}}</p>
    			<p>Ville: {{$habitat->ville_habitat}}</p>
    			<p>Pays: {{$habitat->pays_habitat}}</p>
    		</div>
        <a href="{{ URL::to('habitat/'.$habitat->id) }}" class="btn btn-info pull-right">Voir</a>
      </div>
    @endforeach
  </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
          $(".alert-success").delay(2000).fadeOut();

          $('#categorie').change(function(e){
            if($('#categorie').val() != ""){
              /*$.get("/atypik_house_website/public/habitats/get_enums", function(data){
                alert(data);
              });*/
              var url = '/atypik_house_website/public/habitat/get_champs_recherche';
              var idCategorie = $('#categorie').val();

              $.ajax({
                  url: url,
                  data: {'idCategorie': idCategorie},
                  dataType: "json",                 
              })
              .done(function(data){console.log(data);
                $('.champ_sup').remove();
                $.each(data, function(key, value){console.log(value); 
                    
                    var containerSubmit = $('#btnRechercheForm').parent().parent();

                    if(value.longueur_champ != null){
                      var longueurMax = 'maxlength="'+value.longueur_champ+'"';
                    }else{
                      var longueurMax = "";
                    }

                    $('<div class="form-group champ_sup"><label for="'+value.libelle_champ+'" class="col-lg-2 control-label">'+value.libelle_champ+':</label><div class="col-lg-10"><input class="form-control" placeholder="'+value.placeholder_champ+'" name="'+value.libelle_champ+'" type="'+value.type_champ_id+'" id="'+value.libelle_champ+'" '+longueurMax+'></div></div>').insertBefore(containerSubmit);  

                });
              })
              .fail(function(data) {
                alert("FAIL");console.log("FAIL"); 
              });  
            }else{
              $('.champ_sup').remove();
            }
          });

          $('#btnRecherchePhrase').click(function(){
            var url = "/atypik_house_website/public/habitats";
            var phrase = $('#recherche').val();

            $.ajax({
              url: url,
              data: {'phrase': phrase},
              dataType: "json",                 
            })
            .done(function(data){
              console.log(data); 

              var containerHabitats = $('#containerHabitats');

              containerHabitats.empty();
              /*window.location="{{URL::to('/habitats/edit')}}";*/

              $.each(data, function(key, value){
                /*$('hr').before(
                    '<div class="containerChamp col-lg-8 col-lg-offset-2"><div class="form-control">'+value+'</div></div><div class="containerBtn col-lg-2"><p data-enum="'+value+'" class="btnSupChamp btn btn-danger pull-right">Supprimer</p></div>'
                  );*/
                $(containerHabitats).append('<div>hello</div>');
              });
            })
            .fail(function(data) {
              alert("FAIL"); 
            });  
          });

        });
    </script>
@endsection