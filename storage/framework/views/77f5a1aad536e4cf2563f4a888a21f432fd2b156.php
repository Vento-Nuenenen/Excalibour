<?php
    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';
    }
?>

<?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
    <div class="panel panel-default <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?> <?php endif; ?>">
        <div class="panel-heading">
            <b>Teilnehmer Bestanden</b>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>Name</th>
                    <th>Bestandene Posten</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="panel panel-default <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?> <?php endif; ?>">
        <div class="panel-heading">
            <b>Teilnehmer <u>nicht</u> Bestanden</b>
        </div>
        <div class="panel-body">
            Test
        </div>
    </div>
<?php endif; ?>
