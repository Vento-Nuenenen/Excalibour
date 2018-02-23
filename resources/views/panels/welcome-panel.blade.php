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
                </tr>
                @foreach($bestanden as $best)
                    <tr>
                        <td>{{ $best->first_name ." ". $best->scoutname ." ". $best->last_name }}</td>
                        <td>{{ $best->posten_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="panel panel-default @role('admin', true) @endrole">
        <div class="panel-heading">
            <b>Teilnehmer <u>nicht</u> Bestanden</b>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th>Name</th>
                    <th>Bestandene Posten</th>
                </tr>
                @foreach($nicht_bestanden as $nbest)
                    <tr>
                        <td>{{ $nbest->first_name ." ". $nbest->scoutname ." ". $nbest->last_name }}</td>
                        <td>{{ $nbest->posten_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endrole
