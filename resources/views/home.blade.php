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
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
      $(".alert-success").delay(2000).fadeOut();
        });
    </script>
@endsection