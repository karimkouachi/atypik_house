@extends("layout")

@section('content')

  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

  {!! Form::open(array('route' => 'searchHabitat', 'method' => 'POST', 'class' => 'form-horizontal')) !!}  
      <div class="form-group">
        {!! Form::label('categorie', 'Categorie : ', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
          {!! Form::select('categorie', $categories, null, ['class' => 'form-control' ]) !!}
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('ville_habitat', 'Ville:', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
          {!! Form::text('ville_habitat', null, ['class' => 'form-control', 'placeholder' => 'Paris']) !!}
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          {!! Form::submit('Rechercher', array('class' => 'btn btn-lg btn-success pull-right')) !!}
        </div>
      </div>
  {!! Form::close() !!}

  <div class="row">
    <div class="form-group  col-lg-8 col-lg-offset-2">
      <div class="input-group input-group-lg">
        <input id="recherche" type="text" class="form-control" placeholder="Recherche...">
        <span class="input-group-btn">
          <button id="btnRecherche" class="btn btn-default" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div>

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
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
          $(".alert-success").delay(2000).fadeOut();

          $('#btnRecherche').click(function(){

            var url = "/atypik_house_website/public/habitats";
            var phrase = $('#recherche').val();

            $.ajax({
              url: url,
              data: {'phrase': phrase},
              dataType: "json",                 
            })
            .done(function(data){
              console.log(data); 

              /*window.location="{{URL::to('/habitats/edit')}}";*/

              /*$.each(data, function(key, value){
                $('hr').before(
                    '<div class="containerChamp col-lg-8 col-lg-offset-2"><div class="form-control">'+value+'</div></div><div class="containerBtn col-lg-2"><p data-enum="'+value+'" class="btnSupChamp btn btn-danger pull-right">Supprimer</p></div>'
                  );
              });*/
            })
            .fail(function(data) {
              alert("FAIL"); 
            });  
          });

        });
    </script>
@endsection