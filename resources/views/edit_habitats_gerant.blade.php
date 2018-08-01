@extends("layout")

@section('content')

	<h1>Modifier les habitats</h1>

  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

  <div class="alert alert-success none"></div>

	@if ($errors->any())
    <div>
      @foreach ($errors->all() as $error)
          <p class="alert alert-danger">{{ $error }}</p>
      @endforeach
    </div>
	@endif

  <div id="modal" class="modal" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title"></h2>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button id="btnAnnuler" type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button id="" type="button" class="btn btn-danger">Confirmer</button>
        </div>
      </div>
    </div>
  </div>

	{{ Form::open(array('route' => array('updateHabitatsGerant'), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			{!! Form::label('categories', "Catégorie:", ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::select('categories[]', $categories, null, ['class' => 'form-control selectpicker', 'multiple', 'data-none-selected-text' => 'Catégorie(s) à modifier', 'id' => 'categories']) !!}
			</div>
		</div>     

    <div class="form-group">
      {!! Form::label('label', "Label:", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::text('label', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
      </div>
    </div>

		<div class="form-group">
			{!! Form::label('nom', "Nom:", ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'nom_habitat']) !!}
			</div>
		</div>

    <div class="form-group">
      {!! Form::label('nullable', "Le propriétaire doit il renseigner cette valeur:", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::select('nullable', ['0' => 'Oui', '1' => 'Non'], null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div id="divValeurDefaut" class="form-group">
      {!! Form::label('placeholder', "Placeholder:", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::text('placeholder', null, ['class' => 'form-control', 'placeholder' => 'Exemple...']) !!}
      </div>
    </div>

		<div class="form-group">
			{!! Form::label('type', "Type:", ['class' => 'col-lg-2 control-label']) !!}
			<div class="col-lg-10">
				{!! Form::select('type', $types, null, ['class' => 'form-control']) !!}
			</div>
		</div>

    <div id="divLongueurTotal" class="form-group none">
      {!! Form::label('longueurTotal', "Longueur total:", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::text('longueurTotal', null, ['class' => 'form-control', 'placeholder' => '5']) !!}
      </div>
    </div>

    <div id="divLongueurDecimal" class="form-group none">
      {!! Form::label('longueurDecimal', "Longueur décimal:", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::text('longueurDecimal', null, ['class' => 'form-control', 'placeholder' => '2']) !!}
      </div>
    </div>

    <div id="divLongueur" class="form-group none">
      {!! Form::label('longueur', "Longueur:", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        {!! Form::text('longueur', null, ['class' => 'form-control', 'placeholder' => '255']) !!}
      </div>
    </div>

    <!-- <div class="form-group">
      {!! Form::label('choix', "Choix:", ['class' => 'col-lg-2 control-label']) !!}
      <div class="col-lg-10">
        <div class="radio">
          {!! Form::label('radio1', 'This is option 1.') !!}
          {!! Form::radio('radio', 'option1', true, ['id' => 'radio1']) !!}
        </div>
        <div class="radio">
          {!! Form::label('radio2', 'This is option 2.') !!}
          {!! Form::radio('radio', 'option2', true, ['id' => 'radio2']) !!}
        </div>
      </div>
    </div> -->

		<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        {!! Form::submit('Ajouter', array('class' => 'btn btn-lg btn-success pull-right')) !!}
      </div>
    </div>
	{!! Form::close() !!}

  <div class="table-responsive col-lg-12">
    <h2>Champs des catégories</h2>

    <table class="table table-hover table-condensed table-striped">
      <thead>
        <tr>
          <th class="col-lg-2">Catégorie</th>
          <th class="col-lg-2">Label</th>
          <th class="col-lg-2">Champ</th>
          <th class="col-lg-1">Longueur</th>
          <th class="col-lg-1">Obligatoire</th>
          <th class="col-lg-2">Type</th>
          <th class="col-lg-1">Placeholder</th>
          <th class="col-lg-1">Action</th>
        </tr>
      </thead>
      <tbody id="tbody1">
  
      </tbody>
    </table>
  </div>

  <div class="table-responsive col-lg-12">
    <h2>Champs disponibles</h2>

    <table class="table table-hover table-condensed table-striped">
      <thead>
        <tr>
          <th class="col-lg-2">Catégorie</th>
          <th class="col-lg-2">Label</th>
          <th class="col-lg-2">Champ</th>
          <th class="col-lg-1">Longueur</th>
          <th class="col-lg-1">Obligatoire</th>
          <th class="col-lg-2">Type</th>
          <th class="col-lg-1">Placeholder</th>
          <th class="col-lg-1">Action</th>
        </tr>
      </thead>
      <tbody id="tbody2">
  
      </tbody>
    </table>
  </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

      /*----------------------------------------------------------------------------------------------------------------*/
          $('.selectpicker').selectpicker({
            noneSelectedText: 'Catégorie(s) à modifier'
          });

      /*----------------------------------------------------------------------------------------------------------------*/
          $('body').on("click", ".glyphicon-trash", function(){

            $(this).closest('tr').addClass('select');
            var nomCategorie = $('.select').find(":first-child").text();
            var nomChamp = $('.select').find(":nth-child(3)").text();

            $('.modal-title').text('Supprimer un champ'); 
            $('.modal-body').text('Attention, cette action supprimera définitivement le champ "'+nomChamp+'" pour tout les habitats de catégorie "'+nomCategorie+'".');
            $('.btn-danger').attr('id', 'btnConfirmerSup');

            $('#modal').modal();

          });

      /*----------------------------------------------------------------------------------------------------------------*/
          $('#btnAnnuler').click(function(){
            $('.select').removeClass('select');
          });

      /*----------------------------------------------------------------------------------------------------------------*/
          $('body').on("click", "#btnConfirmerSup", function(){
            var url = "/atypik_house_website/public/habitats/delete_enum";
            var categorie = $('.select').find(":first-child").text();
            var libelleChamp = $('.select').find(":nth-child(3)").text();
            
            $.ajax({
              url: url,
              data: {'categorie': categorie, 'libelleChamp': libelleChamp},
              dataType: "json",                 
            })
            .done(function(reponse){

              $('.select td:last-child').remove();
              var trNew = $('.select').append('<td><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></td>');

              trNew.removeClass('select');
              $('#tbody2').append(trNew);

              $('#modal').modal('toggle');

              /*$('.alert-success').text(reponse).toggleClass('none'); 
              $(".alert-success").delay(2000).fadeOut();*/

            })
            .fail(function(data) {
              alert("FAIL");console.log("FAIL"); 
            });  
          });

      /*----------------------------------------------------------------------------------------------------------------*/
          $(".alert-success").delay(2000).fadeOut();

      /*----------------------------------------------------------------------------------------------------------------*/
          $('#type').change(function(){
            if($(this).val() == "7" || $(this).val() == "4"){
              $('#divLongueur').toggleClass('none');
            }else{
              $('#longueur').parent().parent().addClass('none');
            }

            if($(this).val() == "3"){
              $('#divLongueurTotal').toggleClass('none');
              $('#divLongueurDecimal').toggleClass('none');
            }else{
              $('#longueurTotal').parent().parent().addClass('none');
              $('#longueurDecimal').parent().parent().addClass('none');
            }
          });

      /*----------------------------------------------------------------------------------------------------------------*/
          $("#categories").on("hidden.bs.select", function(e){            
            $('tbody').empty();

            var url = '/atypik_house_website/public/habitats/get_enums';
            var idsCategorie = $('#categories').val();

            if(idsCategorie != ""){
              $.ajax({
                  url: url,
                  data: {'idsCategorie': idsCategorie},
                  dataType: "json",                 
              })
              .done(function(tabs){
                console.log(tabs);

                $.each(tabs[0], function(key, categories){
                  var libelleCategorie = Object.keys(categories)[0];

                  $.each(categories, function(key, categorie){
                    $.each(categorie, function(key, champ){
                      $('#tbody1').append('<tr><td>'+libelleCategorie+'</td><td>'+champ.label_champ+'</td><td>'+champ.libelle_champ+'</td><td>'+champ.longueur_champ+'</td><td>'+champ.null_champ+'</td><td>'+champ.type_champ_id+'</td><td>'+champ.placeholder_champ+'</td><td><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td></tr>');
                    });
                  });

                });

                $.each(tabs[1], function(key, categorie){ 
                  $.each(categorie, function(libelleCategorie, tabChamp){ 
                    $.each(tabChamp, function(key, champ){ 
                      $('#tbody2').append('<tr><td>'+libelleCategorie+'</td><td>'+champ.label_champ+'</td><td>'+champ.libelle_champ+'</td><td>'+champ.longueur_champ+'</td><td>'+champ.null_champ+'</td><td>'+champ.type_champ_id+'</td><td>'+champ.placeholder_champ+'</td><td><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></td></tr>');
                    });
                  });
                });

              })
              .fail(function(data) {
                alert("FAIL");console.log("FAIL"); 
              });  
            }
          });

      /*----------------------------------------------------------------------------------------------------------------*/
          $('body').on("click", ".glyphicon-plus-sign", function(){  
            $(this).closest('tr').addClass('select');

            var nomCategorie = $('.select').find(":first-child").text();
            var nomChamp = $('.select').find(":nth-child(3)").text();

            $('.modal-title').text('Ajouter un champ'); 
            $('.modal-body').text('Attention, cette action ajoutera le champ "'+nomChamp+'" pour tout les habitats de catégorie "'+nomCategorie+'".');
            $('.btn-danger').attr('id', 'btnConfirmerAdd');

            $('#modal').modal();
          });

          $('body').on("click", "#btnConfirmerAdd", function(){

            var url = '/atypik_house_website/public/habitats/add_field_categorie';
            var libelleCategorie = $('.select').find(":first-child").text();
            var libelleChamp = $('.select').find(":nth-child(3)").text();

            $.ajax({
                  url: url,
                  data: {'libelleCategorie': libelleCategorie, 'libelleChamp': libelleChamp},
                  dataType: "json",                 
              })
              .done(function(message){

                $('.select td:last-child').remove();
                var trNew = $('.select').append('<td><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></td>');

                trNew.removeClass('select');

                $('#tbody1').append(trNew);

                $('#modal').modal('toggle');

                /*$('.alert-success').text(message).toggleClass('none'); 
                $(".alert-success").delay(2000).fadeOut();*/

              })
              .fail(function(data) {
                alert("FAIL");console.log("FAIL"); 
              });  
          });

      /*----------------------------------------------------------------------------------------------------------------*/
        });
    </script>
@endsection