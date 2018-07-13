@extends("layout")

@section('content')

<h1>Effectuer une réservation :</h1>

@if ($errors->any())
    <div>
      @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
      @endforeach
    </div>
@endif

{!! Form::open(array('route' => ['storeReservation', $habitat->id], 'method' => 'POST', 'class' => 'form-horizontal')) !!}  
    <div class="form-group">
      {!! Form::label('date_debut_reservation', "Date de début :", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::date('date_debut_reservation', \Carbon\Carbon::now('Europe/Paris'), ['class' => 'form-control']) !!}
      </div>
    </div>  
    <div class="form-group">
      {!! Form::label('date_fin_reservation', "Date de fin :", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::date('date_fin_reservation', \Carbon\Carbon::now('Europe/Paris'), ['class' => 'form-control']) !!}
      </div>
    </div>  
    <div class="form-group">
      {!! Form::label('participants_reservation', "Nombre de participants :", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::number('participants_reservation', 2, ['class' => 'form-control']) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label('commentaire_reservation', "Un petit commentaire ... (facultatif)", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::textarea('commentaire_reservation', null, ['class' => 'form-control', 'id' => 'contenu_message', 'rows' => 4, 'cols' => 54]) !!}
      </div>
    </div>
    {!! Form::hidden('habitat_id', $habitat->id) !!}
    
		
		<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        {!! Form::submit('Étape : Paiement', array('class' => 'btn btn-lg btn-success pull-right')) !!}
      </div>
    </div>
{!! Form::close() !!}
@endsection
