{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('nom_habitat', 'Nom_habitat:') !!}
			{!! Form::text('nom_habitat') !!}
		</li>
		<li>
			{!! Form::label('capacite_habitat', 'Capacite_habitat:') !!}
			{!! Form::text('capacite_habitat') !!}
		</li>
		<li>
			{!! Form::label('prix_habitat', 'Prix_habitat:') !!}
			{!! Form::text('prix_habitat') !!}
		</li>
		<li>
			{!! Form::label('adresse_habitat', 'Adresse_habitat:') !!}
			{!! Form::text('adresse_habitat') !!}
		</li>
		<li>
			{!! Form::label('cp_habitat', 'Cp_habitat:') !!}
			{!! Form::text('cp_habitat') !!}
		</li>
		<li>
			{!! Form::label('ville_habitat', 'Ville_habitat:') !!}
			{!! Form::text('ville_habitat') !!}
		</li>
		<li>
			{!! Form::label('pays_habitat', 'Pays_habitat:') !!}
			{!! Form::text('pays_habitat') !!}
		</li>
		<li>
			{!! Form::label('num_habitat', 'Num_habitat:') !!}
			{!! Form::text('num_habitat') !!}
		</li>
		<li>
			{!! Form::label('photo_habitat', 'Photo_habitat:') !!}
			{!! Form::text('photo_habitat') !!}
		</li>
		<li>
			{!! Form::label('actif_habitat', 'Actif_habitat:') !!}
			{!! Form::text('actif_habitat') !!}
		</li>
		<li>
			{!! Form::label('dispo_habitat', 'Dispo_habitat:') !!}
			{!! Form::text('dispo_habitat') !!}
		</li>
		<li>
			{!! Form::label('en_attente_habitat', 'En_attente_habitat:') !!}
			{!! Form::text('en_attente_habitat') !!}
		</li>
		<li>
			{!! Form::label('date_create_habitat', 'Date_create_habitat:') !!}
			{!! Form::text('date_create_habitat') !!}
		</li>
		<li>
			{!! Form::label('date_valide_habitat', 'Date_valide_habitat:') !!}
			{!! Form::text('date_valide_habitat') !!}
		</li>
		<li>
			{!! Form::label('proprietaire_id', 'Proprietaire_id:') !!}
			{!! Form::text('proprietaire_id') !!}
		</li>
		<li>
			{!! Form::label('categorie_id', 'Categorie_id:') !!}
			{!! Form::text('categorie_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}