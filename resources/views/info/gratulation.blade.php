@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card ExerOne mb-3">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Gratulationen
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent=".ExerOne">
                <div class="card-body table-responsive">
                    Hier können Gratulationen für alle TN als PDF exportiert werden. Diese Richten sich nach dem eingegebenen Text, welcher mit bestimmten "Pattern" versehen werden kann.
                    @pfadiname wird durch den Pfadinamen des TN ersetzt und @exer durch den Exer, welcher gemacht wurde.

                    <br />
                    <hr />
                    <br />

                    <form method="POST" action="{{ route('create-gratulation') }}">
                        {!! csrf_field() !!}

                        <div class="form-group col-sm-10 col-sm-offset-1 has-feedback row {{ $errors->has('certificate_text') ? ' has-error ' : '' }}">
                            <textarea class="form-control" rows="9" name="certificate_text" id="certificate_text">
Lieber
@pfadiname

Du hast den @exer bestanden.
Wir gratulieren dir dazu ganz herzlich und freuen uns darauf, deinen Werdegang in der Pfadi zu verfolgen.

Das Exer-Team
Malena, Yasha
                            </textarea>
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
@endsection
