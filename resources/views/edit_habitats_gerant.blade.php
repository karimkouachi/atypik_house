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

  <div id="modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Supprimer un champ</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="p-body"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button id="btnConfirmer" type="button" class="btn btn-danger">Confirmer</button>
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

		<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        {!! Form::submit('Ajouter', array('class' => 'btn btn-lg btn-success pull-right')) !!}
      </div>
    </div>
	{!! Form::close() !!}

  <div class="table-responsive col-lg-9 col-lg-offset-2">
        <table class="table table-hover table-condensed table-striped">
          <thead>
            <tr>
              <th class="col-lg-5">Catégorie</th>
              <th class="col-lg-5">Champ</th>
              <th class="col-lg-5">Type</th>
              <th class="col-lg-2">Action</th>
            </tr>
          </thead>
          <tbody>
            
            <!-- <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr> -->
      
          </tbody>
        </table>
      </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

          $('.selectpicker').selectpicker({
            noneSelectedText: 'Catégorie(s) à modifier'
          });

          $('body').on("click", ".glyphicon-trash", function(){

            $(this).closest('tr').addClass('select');
            var nomCategorie = $('.select').find(":first-child").text();
            var nomChamp = $('.select').find(":nth-child(2)").text();

            $('.p-body').text('Attention, cette action supprimera définitivement le champ "'+nomChamp+'" pour tout les habitats de catégorie "'+nomCategorie+'".');

            $('#modal').modal();

          });

          /*var colonnesTable = 

          $.each(colonnesTable, function(key, value){console.log(key); console.log(value); 
              $('tbody').append('<tr><td>'+value.nom+'</td><td>'+value.type+'</td><td><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="modal" data-target="#modal"></span></tr>'
                
                '<div data-enum="'+value+'" class="btn btn-danger">'+value+'<button type="button" class="btnSupChamp close" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                /*'<div class="containerChamp col-lg-8 col-lg-offset-2"><div class="form-control">'+value+'</div></div><div class="containerBtn col-lg-2"><p data-enum="'+value+'" class="btnSupChamp btn btn-danger pull-right">Supprimer</p></div>'
              
              );
          });
*/
          $('#btnConfirmer').click(function(){
            

            var url = "/atypik_house_website/public/habitats/delete_enum";
            var categorie = $('.select').find(":first-child").text();
            var libelleChamp = $('.select').find(":nth-child(2)").text();
            
            $.ajax({
              url: url,
              data: {'categorie': categorie, 'libelleChamp': libelleChamp},
              dataType: "json",                 
            })
            .done(function(reponse){
              console.log(reponse); 

              $('.select').remove();
              $('#modal').modal('toggle');

              $('.alert-success').text(reponse).toggleClass('none'); 
              $(".alert-success").delay(2000).fadeOut();
            })
            .fail(function(data) {
              alert("FAIL");console.log("FAIL"); 
            });  
          });

          $(".alert-success").delay(2000).fadeOut();

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

          //select toutes les valeurs enums de la colonne enum de la categorie selectionnée dans la table categorie
          $("#categories").on("hidden.bs.select", function(e){
            
            /*$.get("/atypik_house_website/public/habitats/get_enums", function(data){
              alert(data);
            });*/
            
            $('tbody').empty();

            var url = '/atypik_house_website/public/habitats/get_enums';
            var idsCategorie = $('#categories').val();

            if(idsCategorie != ""){
              $.ajax({
                  url: url,
                  data: {'idsCategorie': idsCategorie},
                  dataType: "json",                 
              })
              .done(function(tabCategories){
                //tableau de toutes les categories
                console.log(tabCategories);

                $.each(tabCategories, function(key, categories){
                  //tableau de tout les champs de la categorie
                  var libelleCategorie = Object.keys(categories)[0];

                  $.each(categories, function(key, categorie){
                    //tableau de toutes les colonnes du champ
                    console.log(categorie); 

                    $.each(categorie, function(key, champ){

                      $('tbody').append('<tr><td>'+libelleCategorie+'</td><td>'+champ.libelle_champ+'</td><td>'+champ.type_champ_id+'</td><td><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></tr>'
                        /*'<div data-enum="'+value+'" class="btn btn-danger">'+value+'<button type="button" class="btnSupChamp close" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'*/
                        /*'<div class="containerChamp col-lg-8 col-lg-offset-2"><div class="form-control">'+value+'</div></div><div class="containerBtn col-lg-2"><p data-enum="'+value+'" class="btnSupChamp btn btn-danger pull-right">Supprimer</p></div>'*/
                      );
                    });
                  });
                });
              })
              .fail(function(data) {
                alert("FAIL");console.log("FAIL"); 
              });  
            }
          });

          /*$('body').on("click", ".btnSupChamp", function(){alert("supression");

            var url = "/atypik_house_website/public/habitats/delete_enum";
            var idsCategorie = $('#categories').val();
            var champ = $(this).attr('data-enum');

            $.ajax({
              url: url,
              data: {'idsCategorie': idsCategorie, 'champ': champ},
              dataType: "json",                 
            })
            .done(function(data){
              alert(data);console.log(data); 

              $('.containerChamp,.containerBtn').remove();

              $.each(data, function(key, value){
                $('hr').before(
                    '<div class="containerChamp col-lg-8 col-lg-offset-2"><div class="form-control">'+value+'</div></div><div class="containerBtn col-lg-2"><p data-enum="'+value+'" class="btnSupChamp btn btn-danger pull-right">Supprimer</p></div>'
                  );
              });
            })
            .fail(function(data) {
              alert("FAIL");console.log("FAIL"); 
            });  
          });*/

        });
    </script>
@endsection