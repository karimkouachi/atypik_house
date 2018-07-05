{!! Form::open(array('route' => 'store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('libelle_activite', 'Libelle_activite:') !!}
			{!! Form::text('libelle_activite') !!}
		</li>
		<li>
			{!! Form::label('adresse_activite', 'Adresse_activite:') !!}
			{!! Form::text('adresse_activite') !!}
		</li>
		<li>
			{!! Form::label('cp_activite', 'Cp_activite:') !!}
			{!! Form::text('cp_activite') !!}
		</li>
		<li>
			{!! Form::label('ville_activite', 'Ville_activite:') !!}
			{!! Form::text('ville_activite') !!}
		</li>
		<li>
			{!! Form::label('pays_activite', 'Pays_activite:') !!}
			{!! Form::text('pays_activite') !!}
		</li>
		<li>
			{!! Form::label('descriptif_activite', 'Descriptif_activite:') !!}
			{!! Form::text('descriptif_activite') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}