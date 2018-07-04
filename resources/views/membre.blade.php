{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('mail_membre', 'Mail_membre:') !!}
			{!! Form::text('mail_membre') !!}
		</li>
		<li>
			{!! Form::label('nom_membre', 'Nom_membre:') !!}
			{!! Form::text('nom_membre') !!}
		</li>
		<li>
			{!! Form::label('prenom_membre', 'Prenom_membre:') !!}
			{!! Form::text('prenom_membre') !!}
		</li>
		<li>
			{!! Form::label('naissance_membre', 'Naissance_membre:') !!}
			{!! Form::text('naissance_membre') !!}
		</li>
		<li>
			{!! Form::label('adresse_membre', 'Adresse_membre:') !!}
			{!! Form::text('adresse_membre') !!}
		</li>
		<li>
			{!! Form::label('cp_membre', 'Cp_membre:') !!}
			{!! Form::text('cp_membre') !!}
		</li>
		<li>
			{!! Form::label('ville_membre', 'Ville_membre:') !!}
			{!! Form::text('ville_membre') !!}
		</li>
		<li>
			{!! Form::label('pays_membre', 'Pays_membre:') !!}
			{!! Form::text('pays_membre') !!}
		</li>
		<li>
			{!! Form::label('actif_membre', 'Actif_membre:') !!}
			{!! Form::text('actif_membre') !!}
		</li>
		<li>
			{!! Form::label('photo_membre', 'Photo_membre:') !!}
			{!! Form::text('photo_membre') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}