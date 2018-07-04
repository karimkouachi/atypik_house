{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('date_debut_reservation', 'Date_debut_reservation:') !!}
			{!! Form::text('date_debut_reservation') !!}
		</li>
		<li>
			{!! Form::label('date_fin_reservation', 'Date_fin_reservation:') !!}
			{!! Form::text('date_fin_reservation') !!}
		</li>
		<li>
			{!! Form::label('participants_reservation', 'Participants_reservation:') !!}
			{!! Form::text('participants_reservation') !!}
		</li>
		<li>
			{!! Form::label('commentaire_reservation', 'Commentaire_reservation:') !!}
			{!! Form::text('commentaire_reservation') !!}
		</li>
		<li>
			{!! Form::label('habitat_id', 'Habitat_id:') !!}
			{!! Form::text('habitat_id') !!}
		</li>
		<li>
			{!! Form::label('locataire_id', 'Locataire_id:') !!}
			{!! Form::text('locataire_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}