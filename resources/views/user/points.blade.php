@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Punkte hinzufügen</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('add_points') }}">
                            {!! csrf_field() !!}

                            <div class="form-group has-feedback row {{ $errors->has('users') ? ' has-error ' : '' }}">
                                {!! Form::label('users', 'TN wählen', array('class' => 'col-md-2 control-label')); !!}
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <select class="form-control" name="users" id="users" required>
                                            <option value="">TN wählen</option>
                                            @if(count($users))
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->first_name." ". $user->scoutname." ".$user->last_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="input-group-addon" for="users"><i class="fa fa-fw {{ trans('forms.create_user_icon_role') }}" aria-hidden="true"></i></label>
                                    </div>
                                    @if ($errors->has('users'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('users') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('posten') ? ' has-error ' : '' }}">
                                {!! Form::label('posten', 'Posten wählen', array('class' => 'col-md-2 control-label')); !!}
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <select class="form-control" name="posten" id="posten" required>
                                            <option value="">Posten wählen</option>
                                            @if(count($groups))
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->posten_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <label class="input-group-addon" for="name"><i class="fa fa-fw {{ trans('forms.create_user_icon_role') }}" aria-hidden="true"></i></label>
                                    </div>
                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group has-feedback row {{ $errors->has('reached_points') ? ' has-error ' : '' }}">
                                {!! Form::label('reached_points', 'Erreichte Punkte' , array('class' => 'col-md-2 control-label')); !!}
                                <div class="col-md-10">
                                    <div class="input-group">
                                        {!! Form::number('reached_points', $value = '1', ['min' => '1', 'id' => 'reached_points', 'class' => 'form-control','required']) !!}
                                        <label class="input-group-addon" for="reached_points"><i class="fa fa-fw fa-calculator" aria-hidden="true"></i></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row col-md-offset-2">
                                <button type="submit" class="btn btn-success"><i class='fa fa-fw fa-save' aria-hidden='true'></i> Posten hinzufügen</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Festgelegte Punkte</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(isset($setPoints[0]))
                            <table class="table table-hover">
                                <tr>
                                    <th>TN</th>
                                    <th>Gruppe</th>
                                    <th>Punkte</th>
                                    <th>Optionen</th>
                                </tr>
                                @foreach($setPoints as $point)
                                    <tr>
                                        <td>{{ $point->first_name." ".$point->scoutname." ".$point->last_name }}</td>
                                        <td>{{ $point->posten_name }}</td>
                                        <td>{{ $point->reached_points }}</td>
                                        <td><i class="fa fa-close"></i></td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <h4 class="text-center">Keine Punkte festgelegt!</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
