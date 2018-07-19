@extends("layout")

@section('content')

  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

  @foreach ($reservations as $reservation)      
    <div class="jumbotron">
  		<h1>Réservation n°{{$reservation->id}}</h1>

  		<div>
  			<p>Début de la réservation : {{ Carbon\Carbon::parse($reservation->date_debut_reservation)->format('d/m/Y') }}</p>
  			<p>Fin de la réservation : {{ Carbon\Carbon::parse($reservation->date_fin_reservation)->format('d/m/Y') }}</p>
  			<p>Nombre de participants : {{ $reservation->participants_reservation }}</p>
  		</div>
      <a href="{{ URL::to('reservation/'.$reservation->id) }}" class="btn btn-info pull-right">Voir</a>
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