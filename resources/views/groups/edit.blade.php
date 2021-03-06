@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card EditParticipant mb-3">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Gruppe bearbeiten
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent=".EditParticipant">
                <div class="card-body table-responsive">
                    {!! Form::open(array('route' => ['update-groups',$groups->id], 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                        {!! csrf_field() !!}

                        <div class="form-group has-feedback row {{ $errors->has('group_name') ? ' has-error ' : '' }}">
                            {!! Form::label('group_name', 'Gruppenname', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    {!! Form::text('group_name', old('group_name', $groups->group_name ?? null), array('id' => 'group_name', 'class' => 'form-control', 'placeholder' => 'Gruppenname')) !!}
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="group_name">
                                            <i class="fa fa-group" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('group_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('group_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group has-feedback row {{ $errors->has('field') ? ' has-error ' : '' }}">
                            {!! Form::label('field', 'Posten', array('class' => 'col-md-3 control-label')); !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    <select class="custom-select form-control" name="field" id="field">
                                        <option value="">Posten wählen</option>
                                        @if ($fields)
                                            @foreach($fields as $field)
                                                <option value="{{ $field->id }}" {{ ($groups->FK_FLD == $field->id) ? 'selected':'' }}>{{ $field->field_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="field">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
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

                        {!! Form::button('Gruppe aktualisieren', array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
