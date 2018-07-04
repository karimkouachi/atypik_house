{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('contenu_message', 'Contenu_message:') !!}
			{!! Form::text('contenu_message') !!}
		</li>
		<li>
			{!! Form::label('date_message', 'Date_message:') !!}
			{!! Form::text('date_message') !!}
		</li>
		<li>
			{!! Form::label('expediteur_id', 'Expediteur_id:') !!}
			{!! Form::text('expediteur_id') !!}
		</li>
		<li>
			{!! Form::label('destinataire_id', 'Destinataire_id:') !!}
			{!! Form::text('destinataire_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}