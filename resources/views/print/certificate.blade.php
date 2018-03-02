@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Gratulationen drucken</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="alert alert-info">
                            Hier können Gratulationen für alle TN als PDF exportiert werden. Diese Richten sich nach dem eingegebenen Text, welcher mit bestimmten "Pattern" versehen werden kann.
                            @pfadiname wird durch den Pfadinamen des TN ersetzt und @exer durch den Exer, welcher gemacht wurde.
                        </div>

                        <form method="POST" action="{{ route('print') }}">
                            {!! csrf_field() !!}

                            <div class="form-group col-sm-10 col-sm-offset-1 has-feedback row {{ $errors->has('certificate_text') ? ' has-error ' : '' }}">
                                <textarea class="form-control" rows="9" name="certificate_text" id="certificate_text">
Lieber
@pfadiname

Du hast den @exer bestanden.
Wir gratulieren dir dazu ganz herzlich und freuen uns darauf, deinen Werdegang in der Pfadi zu verfolgen.

Das Exer-Team
Malena, Yasha</textarea>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-success col-md-3"><i class='fa fa-fw fa-save' aria-hidden='true'></i> Drucken</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
