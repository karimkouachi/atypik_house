{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('adrCli_facture', 'AdrCli_facture:') !!}
			{!! Form::text('adrCli_facture') !!}
		</li>
		<li>
			{!! Form::label('cpVilleCli_facture', 'CpVilleCli_facture:') !!}
			{!! Form::text('cpVilleCli_facture') !!}
		</li>
		<li>
			{!! Form::label('paysCli_facture', 'PaysCli_facture:') !!}
			{!! Form::text('paysCli_facture') !!}
		</li>
		<li>
			{!! Form::label('montantHT_facture', 'MontantHT_facture:') !!}
			{!! Form::text('montantHT_facture') !!}
		</li>
		<li>
			{!! Form::label('montantTVA_facture', 'MontantTVA_facture:') !!}
			{!! Form::text('montantTVA_facture') !!}
		</li>
		<li>
			{!! Form::label('montantTTC_facture', 'MontantTTC_facture:') !!}
			{!! Form::text('montantTTC_facture') !!}
		</li>
		<li>
			{!! Form::label('etat_facture', 'Etat_facture:') !!}
			{!! Form::text('etat_facture') !!}
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