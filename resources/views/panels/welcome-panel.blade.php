@php
    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';
    }
@endphp

<div class="panel panel-default @role('admin', true) @endrole">
    @role('admin')
        <div class="panel-heading">
            <b>Teilnehmer Bestanden</b>
        </div>
        <div class="panel-body">
            Test
        </div>
    @endrole
</div>
