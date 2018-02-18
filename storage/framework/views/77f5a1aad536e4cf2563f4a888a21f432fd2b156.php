<?php
    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';
    }
?>

<div class="panel panel-default <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?> <?php endif; ?>">
    <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
        <div class="panel-heading">
            <b>Teilnehmer Bestanden</b>
        </div>
        <div class="panel-body">
            Test
        </div>
    <?php endif; ?>
</div>
