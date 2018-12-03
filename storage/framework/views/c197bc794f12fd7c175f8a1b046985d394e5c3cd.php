<?php $__env->startSection('template_title'); ?>
    Welcome <?php echo e(Auth::user()->scoutname ? Auth::user()->scoutname : Auth::user()->first_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <?php echo $__env->make('panels.welcome-panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>