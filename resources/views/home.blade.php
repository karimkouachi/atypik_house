@extends('layouts.app')

@section('content')
  @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif 
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Bienvenue!</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        Bienvenue sur Atypik House {{ Auth::user()->pseudo_membre }} !

                        {{ Form::open(array('url' => 'home/' . Auth::user()->id . '/disableAccount')) }}
                          {{ Form::hidden('_method', 'POST') }}
                          {{ Form::submit('Désactiver mon compte', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group  col-lg-8 col-lg-offset-2">
          <div class="input-group input-group-lg">
            <input id="recherche" type="text" class="form-control" placeholder="Recherche...">
            <span class="input-group-btn">
              <button id="btnRecherche" class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#btnRecherche').click(function(){

            var url = "/atypik_house_website/public/habitats";
            var phrase = $('#recherche').val();

            $.ajax({
              url: url,
              data: {'phrase': phrase},
              dataType: "json",                 
            })
            .done(function(data){
              console.log(data); 

              /*window.location="{{URL::to('/habitats', ['habitats' => "+data+"] )}}";*/

              /*$.each(data, function(key, value){
                $('hr').before(
                    '<div class="containerChamp col-lg-8 col-lg-offset-2"><div class="form-control">'+value+'</div></div><div class="containerBtn col-lg-2"><p data-enum="'+value+'" class="btnSupChamp btn btn-danger pull-right">Supprimer</p></div>'
                  );
              });*/
            })
            .fail(function(data) {
              alert("FAIL"); 
            });  
          });


      $(".alert-success").delay(2000).fadeOut();

        });
    </script>
@endsection