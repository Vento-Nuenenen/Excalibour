@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-info">
                            <b>Anleitung</b><br />
                            Mehrere Benutzer können hier mittels einer Datei Importiert werden. Dies funktioniert folgendermassen:
                        </div>

                        @role('admin')
                            {!! Form::open(['url' => route('import_do'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}
                            {!! Form::close() !!}
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
