{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('montant_transaction', 'Montant_transaction:') !!}
			{!! Form::text('montant_transaction') !!}
		</li>
		<li>
			{!! Form::label('date_transaction', 'Date_transaction:') !!}
			{!! Form::text('date_transaction') !!}
		</li>
		<li>
			{!! Form::label('tx_remboursement_transaction', 'Tx_remboursement_transaction:') !!}
			{!! Form::text('tx_remboursement_transaction') !!}
		</li>
		<li>
			{!! Form::label('locataire_id', 'Locataire_id:') !!}
			{!! Form::text('locataire_id') !!}
		</li>
		<li>
			{!! Form::label('type_id', 'Type_id:') !!}
			{!! Form::text('type_id') !!}
		</li>
		<li>
			{!! Form::label('proprietaire_id', 'Proprietaire_id:') !!}
			{!! Form::text('proprietaire_id') !!}
		</li>
		<li>
			{!! Form::label('reservation_id', 'Reservation_id:') !!}
			{!! Form::text('reservation_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}