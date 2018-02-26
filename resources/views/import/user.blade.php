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

                        <form action="{{ route('import_user_do') }}" method="POST">
                            {{ Form::token() }}
                            <input type="file" id="user_file" name="user_file" />
                            <button type="submit" id="upload_user_file">Datei hochladen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
