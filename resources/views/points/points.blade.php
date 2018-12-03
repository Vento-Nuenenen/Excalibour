@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card mb-3">
            <div class="card-header">
                {!! Form::open(array('route' => 'participations', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                <div class="input-group" id="adv-search">
                    {!! Form::text('search', NULL, array('id' => 'search', 'class' => 'form-control', 'placeholder' => 'Suche')) !!}
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary form-control">
                            <span class="fa fa-search"></span>
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="input-group" id="adv-search">
                    <button onclick="location.href='{{ route('add-points') }}'" type="button" class="btn btn-primary form-control mt-2">Neuer Punktsatz</button>
                </div>
            </div>
        </div>

        <div class="card Points mb-3">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Punktsätze
                    </button>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent=".Points">
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Abteilung
                            </th>
                            <th>
                                Posten
                            </th>
                            <th>
                                Punkte
                            </th>
                            <th>
                                Bestanden
                            </th>
                            <th>
                                Optionen
                            </th>
                        </thead>
                        <tbody>
                            @foreach($points as $point)
                                <tr>
                                    <td>
                                        @if($point->scout_name)
                                            {{ $point->scout_name }} / {{ $point->first_name }} {{ $point->last_name }}
                                        @else
                                            {{ $point->first_name }} {{ $point->last_name }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $point->group_name }}
                                    </td>
                                    <td>
                                        {{ $point->field_name }}
                                    </td>
                                    <td>
                                        {{ $point->reached_points }} / {{ $point->MAX_POINTS }}
                                    </td>
                                    <td>
                                        @if($point->reached_points > ($point->MAX_POINTS/ 2))
                                            <i class="fa fa-check fa-lg"></i>
                                        @else
                                            <i class="fa fa-remove fa-lg"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <button onclick="location.href='{{ route('edit-points',$point->id) }}'" class="btn btn-danger ml-2"><span class="fa fa-edit"></span></button>
                                        <button onclick="location.href='{{ route('destroy-points',$point->id) }}'" class="btn btn-danger ml-2"><span class="fa fa-remove"></span></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
