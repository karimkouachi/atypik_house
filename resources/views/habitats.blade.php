@extends("layout")

@section('content')

  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

  {!! Form::open(array('route' => 'searchHabitat', 'method' => 'POST', 'class' => 'form-horizontal')) !!}  
      <div class="form-group">
        {!! Form::label('categorie', 'Categorie : ', ['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
          {!! Form::select('categorie', $categories, ['class' => 'form-control' ]) !!}
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
        });
    </script>
@endsection