@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Posten hinzufügen</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <form method="POST" action="{{ route('add_groups') }}">
                                {!! csrf_field() !!}

                                <div class="form-group has-feedback row {{ $errors->has('new_group') ? ' has-error ' : '' }}">
                                    {!! Form::label('new_group', 'Neue Gruppe' , array('class' => 'col-md-2 control-label')); !!}
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            {!! Form::text('new_group', old('new_group'), array('id' => 'new_group', 'class' => 'form-control', 'placeholder' => 'Neue Gruppe','required')) !!}
                                            <label class="input-group-addon" for="new_group"><i class="fa fa-fw fa-users" aria-hidden="true"></i></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row {{ $errors->has('max_points') ? ' has-error ' : '' }}">
                                    {!! Form::label('max_points', 'Maximale Punkte' , array('class' => 'col-md-2 control-label')); !!}
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            {!! Form::number('max_points', $value = '1', ['min' => '1', 'id' => 'max_points', 'class' => 'form-control','required']) !!}
                                            <label class="input-group-addon" for="max_points"><i class="fa fa-fw fa-calculator" aria-hidden="true"></i></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row col-md-offset-2">
                                    <button type="submit" class="btn btn-success"><i class='fa fa-fw fa-save' aria-hidden='true'></i> Posten hinzufügen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Bestehende Posten</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(isset($groups[0]))
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Posten Name</th>
                                    <th>Maximale Punkte</th>
                                    <th>Optionen</th>
                                </tr>
                                @foreach($groups as $group)
                                    <tr>
                                        <td>{{ $group['posten_name'] }}</td>
                                        <td>{{ $group['max_points'] }}</td>
                                        <td>
                                            {{ Form::open([ 'method'  => 'post', 'action' => 'GroupController@delete']) }}
                                                <input type="text" class="hidden" name="group_id" value="{{ $group['id'] }}">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-close"></i></button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @else
                        <h4 class="text-center">Keine Gruppe gefunden</h4>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
