{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('libelle_categorie', 'Libelle_categorie:') !!}
			{!! Form::text('libelle_categorie') !!}
		</li>
		<li>
			{!! Form::label('enum_categorie', 'Enum_categorie:') !!}
			{!! Form::text('enum_categorie') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}