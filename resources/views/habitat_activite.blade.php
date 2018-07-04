{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('habitat_id', 'Habitat_id:') !!}
			{!! Form::text('habitat_id') !!}
		</li>
		<li>
			{!! Form::label('activite_id', 'Activite_id:') !!}
			{!! Form::text('activite_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}