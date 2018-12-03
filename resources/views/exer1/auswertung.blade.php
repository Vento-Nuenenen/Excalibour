@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Teilnehmer 1. Exer Bestanden</b>
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Bestandene Posten</th>
                                <th>Erreichte Punkte</th>
                            </tr>
                            @foreach($bestanden as $best)
                                <tr>
                                    <td>{{ $best->first_name." ".$best->scoutname." ".$best->last_name }}</td>
                                    <td>
                                        @foreach($best->post_name as $postn)
                                            {{ $postn . " | " }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @php($pnt = 0)
                                        @foreach($best->post_points as $post_points)
                                            @php($pnt += $post_points)
                                        @endforeach
                                        {{ $pnt }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Teilnehmer 1. Exer <u>nicht</u> Bestanden</b>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Bestandene Posten</th>
                                <th>Erreichte Punkte</th>
                            </tr>
                            @foreach($nicht_bestanden as $nbest)
                                <tr>
                                    <td>{{ $nbest->first_name." ".$nbest->scoutname." ".$nbest->last_name }}</td>
                                    <td>
                                        @foreach($posten_bestanden as $post_best)
                                            {{ $post_best . " | " }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @php($pnt = 0)
                                        @foreach($nbest->post_points as $post_points)
                                            @php($pnt += $post_points)
                                        @endforeach
                                        {{ $pnt }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
