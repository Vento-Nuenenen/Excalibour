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
                <?php $__currentLoopData = $bestanden; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $best): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($best->first_name ." ". $best->scoutname ." ". $best->last_name); ?></td>
                        <td><?php echo e($best->posten_name); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>

    <div class="panel panel-default <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?> <?php endif; ?>">
        <div class="panel-heading">
            <b>Teilnehmer <u>nicht</u> Bestanden</b>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <tr>
                    <th>Name</th>
                    <th>Bestandene Posten</th>
                </tr>
                <?php $__currentLoopData = $nicht_bestanden; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nbest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($nbest->first_name ." ". $nbest->scoutname ." ". $nbest->last_name); ?></td>
                        <td><?php echo e($nbest->posten_name); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
<?php endif; ?>
