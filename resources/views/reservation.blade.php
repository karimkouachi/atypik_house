@extends("layout")

@section('content')

  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif   
  <div class="jumbotron">
		<h1>Réservation n°{{$reservation->id}}</h1>

		<div>
			<p>Début de la réservation : {{ Carbon\Carbon::parse($reservation->date_debut_reservation)->format('d/m/Y') }}</p>
			<p>Fin de la réservation : {{ Carbon\Carbon::parse($reservation->date_fin_reservation)->format('d/m/Y') }}</p>
			<p>Nombre de participants : {{ $reservation->participants_reservation }}</p>

      @if ($reservation->commentaire_reservation != null)
        <p>
          Commentaire : {{ $reservation->commentaire_reservation }} 
          <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalDeleteComment">Supprimer ce commentaire</button>
          <div class="modal fade" id="modalDeleteComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">/!\</h4>
                </div>
                {!! Form::open(array('url' => 'reservation/'.$reservation->id.'/deleteComment')) !!}
                  {{ Form::hidden('_method', 'POST') }}
                <div class="modal-body">
                    <div class="form-group">
                      <p>Êtes-vous sûr(e)?</p>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                  {!! Form::submit('Oui', array('class' => 'btn btn-danger')) !!}
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </p>
      @endif

      @if (Carbon\Carbon::now() > $reservation->date_fin_reservation && $reservation->commentaire_reservation == null)
        <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modalCommenterLocation">Commenter la location</button>
          <div class="modal fade" id="modalCommenterLocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="exampleModalLabel">Commenter votre séjour</h4>
                </div>
                {!! Form::open(array('url' => 'reservation/'.$reservation->id.'/commentStay')) !!}
                  {{ Form::hidden('_method', 'POST') }}
                <div class="modal-body">
                    <div class="form-group">
                      {!! Form::label('commentaire_reservation', "Commentaire :", ['class' => 'control-label']) !!}
                        {!! Form::textarea('commentaire_reservation', null, ['class' => 'form-control', 'id' => 'commentaire_reservation', 'rows' => 4, 'cols' => 54]) !!}
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  {!! Form::submit('Envoyer', array('class' => 'btn btn-success')) !!}
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
      @endif
		</div>
  </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
      $(".alert-success").delay(2000).fadeOut();
        });
    </script>
@endsection