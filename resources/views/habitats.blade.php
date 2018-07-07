@extends("layout")

@section('content')

  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

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