@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Suche" />
                <div class="input-group-append">
                    <button type="button" class="btn btn-primary">
                        <span class="fa fa-search"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card ExerOne mb-3">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Erst Exer
                </button>
            </h5>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent=".ExerOne">
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
                            Posten bestanden
                        </th>
                        <th>
                            Punkte total
                        </th>
                        <th>
                            Status
                        </th>
                    </thead>
                    <tbody>
                        @foreach($first as $participation)
                            <tr>
                                <td>
                                    @if($participation->scout_name)
                                        {{ $participation->scout_name }} / {{ $participation->first_name }} {{ $participation->last_name }}
                                    @else
                                        {{ $participation->first_name }} {{ $participation->last_name }}
                                    @endif
                                </td>
                                <td>
                                    {{ $participation->group_name }}
                                </td>
                                <td>
                                    @for ($i = 0; $i < count($participation->fields); $i++)
                                        @if($participation->points[$i] > floor((int) $participation->maxpoints / 2))
                                            <span class="badge badge-success"> {{ $participation->fields[$i] }} ({{ $participation->points[$i] }} / {{ $participation->maxpoints[$i] }}) </span>
                                        @endif
                                    @endfor
                                </td>
                                <td>
                                   {{ $participation->reached_points }} / {{$max_points}}
                                </td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card ExerTwo">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Zweit Exer
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent=".ExerTwo">
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
                            Status
                        </th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
