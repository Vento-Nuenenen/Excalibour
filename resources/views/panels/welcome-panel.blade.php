@php
    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';
    }
@endphp

@role('admin')
    <div class="panel panel-default @role('admin', true) @endrole">
        <div class="panel-heading">
            <b>Teilnehmer Bestanden</b>
        </div>
        <div class="panel-body table-responsive">
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

    <div class="panel panel-default @role('admin', true) @endrole">
        <div class="panel-heading">
            <b>Teilnehmer <u>nicht</u> Bestanden</b>
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
@endrole
