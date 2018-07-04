{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('url_image', 'Url_image:') !!}
			{!! Form::text('url_image') !!}
		</li>
		<li>
			{!! Form::label('date_image', 'Date_image:') !!}
			{!! Form::text('date_image') !!}
		</li>
		<li>
			{!! Form::label('habitat_id', 'Habitat_id:') !!}
			{!! Form::text('habitat_id') !!}
		</li>
		<li>
			{!! Form::label('membre_id', 'Membre_id:') !!}
			{!! Form::text('membre_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}