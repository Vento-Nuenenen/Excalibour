@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card ExerOne mb-3">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Posten erstellen
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent=".ExerOne">
                <div class="card-body">
                    {!! Form::open(array('route' => 'store-fields', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                        {!! csrf_field() !!}

                        <div class="form-group has-feedback row {{ $errors->has('field_name') ? ' has-error ' : '' }}">
                            {!! Form::label('field_name', 'Postenname', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('field_name', NULL, array('id' => 'field_name', 'class' => 'form-control', 'placeholder' => 'Postenname')) !!}
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="field_name">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('field_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('field_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('field_description') ? ' has-error ' : '' }}">
                            {!! Form::label('field_description', 'Postenbeschreibung', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('field_description', NULL, array('id' => 'field_description', 'class' => 'form-control', 'placeholder' => 'Postenbeschreibung')) !!}
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="field_description">
                                            <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('field_points') ? ' has-error ' : '' }}">
                            {!! Form::label('field_points', 'Maximale Punkte', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::number('field_points', NULL, array('id' => 'field_points', 'class' => 'form-control', 'placeholder' => 'Maximale Punkte')) !!}
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="field_points">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('field_points'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('field_points') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {!! Form::button('Posten erstellen', array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
