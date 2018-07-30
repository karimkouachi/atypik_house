@extends("layout")

@section('content')

  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

  <div class="jumbotron text-center">
		<h1>{{$habitat->nom_habitat}}</h1>

		<div>
			<p>Capacité de l'habitat: {{$habitat->capacite_habitat}}</p>
			<p>Prix de l'habitat: {{$habitat->prix_habitat}} €</p>
			<p>Code postal: {{$habitat->cp_habitat}}</p>
			<p>Ville: {{$habitat->ville_habitat}}</p>
			<p>Pays: {{$habitat->pays_habitat}}</p>
		</div>
    
    <div class="btn-group" role="group" aria-label="...">
      @if ($habitat->dispo_habitat == 1)
        <a href="{{ URL::to('reservation/'.$habitat->id.'/makeReservation') }}" class="btn btn-info">Réserver cet habitat</a>
      @endif
      @if ($habitat->dispo_habitat == 1)
        <a href="{{ URL::to('activite/'.$habitat->id.'/create') }}" class="btn btn-info">Renseigner une activité</a>
      @endif
      <a href="{{ URL::to('habitat/'.$habitat->id.'/allReservations') }}" class="btn btn-info">Voir réservations de cet habitat</a>
      @if ($habitat->actif_habitat == 0)
        {!! Form::open(array('url' => 'habitat/'. $habitat->id . '/checkHabitat')) !!}
          {{ Form::hidden('_method', 'POST') }}
          {{ Form::submit('Valider cet habitat', array('class' => 'btn')) }}
        {{ Form::close() }}
      @endif
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalMessageProprietaire">Discuter avec le propriétaire</button>
      {{ Form::open(array('url' => 'habitat/' . $habitat->id . '/delete', 'class' => 'pull-right')) }}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Masquer l\'habitat', array('class' => 'btn btn-danger')) }}
      {{ Form::close() }}
    </div>
    <div class="modal fade" id="modalMessageProprietaire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Nouveau message</h4>
          </div>
          {!! Form::open(array('url' => 'habitat/'. $habitat->id . '/sendMessage')) !!}
            {{ Form::hidden('_method', 'POST') }}
          <div class="modal-body">
              <div class="form-group">
                {!! Form::label('destinataire', "Destinataire :", ['class' => 'control-label']) !!}
                {!! Form::text('destinataire', $habitat->proprietaire->mail_membre .' ('. $habitat->proprietaire->pseudo_membre .')', ['class' => 'form-control', 'placeholder' => 'Henri Dupont']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('contenu_message', "Message :", ['class' => 'control-label']) !!}
                  {!! Form::textarea('contenu_message', null, ['class' => 'form-control', 'id' => 'contenu_message', 'rows' => 4, 'cols' => 54]) !!}
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
  </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
      $(".alert-success").delay(2000).fadeOut();
        });
    </script>
@endsection