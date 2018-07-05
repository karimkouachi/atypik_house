@extends("layout")

@section('content')

  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

  <div class="jumbotron text-center">
		<h1>{{$habitat->nom_habitat}}</h1>

		<div>
			<p>Capacité de l'habitat: {{$habitat->capacite_habitat}}</p>
			<p>Prix de l'habitat: {{$habitat->prix_habitat}}</p>
			<p>Code postal: {{$habitat->cp_habitat}}</p>
			<p>Ville: {{$habitat->ville_habitat}}</p>
			<p>Pays: {{$habitat->pays_habitat}}</p>
		</div>
    {{ Form::open(array('url' => 'habitat/' . $habitat->id . '/delete', 'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}
  </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
      $(".alert-success").delay(2000).fadeOut();
        });
    </script>
@endsection