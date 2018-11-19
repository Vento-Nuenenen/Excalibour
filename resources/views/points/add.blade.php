@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="card ExerOne mb-3">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Neuer Punktesatz
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent=".ExerOne">
                <div class="card-body">
                    {!! Form::open(array('route' => 'store-points', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                        {!! csrf_field() !!}

                        <div class="form-group has-feedback row {{ $errors->has('participation') ? ' has-error ' : '' }}">
                            {!! Form::label('participation', 'Teilnehmer', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    <select class="custom-select form-control" name="participation" id="participation" data-live-search="true">
                                        <option value="">Teilnehmer wählen</option>
                                        @if ($participations)
                                            @foreach($participations as $participation)
                                                <option value="{{ $participation->id }}">{{ empty($participation->scout_name) ? $participation->scout_name." / "
                                                .$participation->scout_name." ".$participation->scout_name : $participation->scout_name." ".$participation->scout_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="participation">
                                            <i class="fa fa-group" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('participation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('participation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('field') ? ' has-error ' : '' }}">
                            {!! Form::label('field', 'Posten', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    <select class="custom-select form-control" name="field" id="field" data-live-search="true">
                                        <option value="">Posten wählen</option>
                                        @if ($fields)
                                            @foreach($fields as $field)
                                                <option value="{{ $field->id }}">{{ $field->field_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="field">
                                            <i class="fa fa-group" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('field'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('field') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('reached_points') ? ' has-error ' : '' }}">
                            {!! Form::label('reached_points', 'Erreichte Punkte', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::number('reached_points', NULL, array('id' => 'reached_points', 'class' => 'form-control', 'placeholder' => 'Punkte')) !!}
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="reached_points">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('reached_points'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reached_points') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {!! Form::button('Benutzer erstellen', array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

