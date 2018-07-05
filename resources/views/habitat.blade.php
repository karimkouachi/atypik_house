@extends("welcome")

	@section('content')
		<h1>{{$habitat->nom_habitat}}</h1>

		<div>
			<p>Capacité de l'habitat: {{$habitat->nombre_habitat}}</p>
			<p>Prix de l'habitat: {{$habitat->prix_habitat}}</p>
			<p>Code postal: {{$habitat->cp_habitat}}</p>
			<p>Ville: {{$habitat->ville_habitat}}</p>
			<p>Pays: {{$habitat->pays_habitat}}</p>
		</div>
	@endsection
