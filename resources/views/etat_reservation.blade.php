{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('libelle_etat', 'Libelle_etat:') !!}
			{!! Form::text('libelle_etat') !!}
		</li>
		<li>
			{!! Form::label('valeur_etat', 'Valeur_etat:') !!}
			{!! Form::text('valeur_etat') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}