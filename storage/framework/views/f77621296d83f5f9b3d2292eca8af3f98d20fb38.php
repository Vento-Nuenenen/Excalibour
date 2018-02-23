<?php $__env->startSection('template_title'); ?>
  Neuen Benutzer erstellen
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">

            Create New User

            <a href="/users" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              Back <span class="hidden-xs">to</span><span class="hidden-xs"> Users</span>
            </a>

          </div>
          <div class="panel-body">

            <?php echo Form::open(array('action' => 'UsersManagementController@store')); ?>


              <div class="form-group has-feedback row <?php echo e($errors->has('scoutname') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('name', trans('forms.create_user_label_username'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('scoutname', NULL, array('id' => 'scoutname', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_username'))); ?>

                    <label class="input-group-addon" for="scoutname"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_username')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('scoutname')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('scoutname')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('first_name') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('first_name', NULL, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

                    <label class="input-group-addon" for="name"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_firstname')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('first_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))); ?>

                    <label class="input-group-addon" for="name"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('last_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('email') ? ' has-error ' : ''); ?>">
                  <?php echo Form::label('email', trans('forms.create_user_label_email'), array('class' => 'col-md-3 control-label'));; ?>

                  <div class="col-md-9">
                      <div class="input-group">
                          <?php echo Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_email'))); ?>

                          <label class="input-group-addon" for="email"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_email')); ?>" aria-hidden="true"></i></label>
                      </div>
                      <?php if($errors->has('email')): ?>
                          <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                      <?php endif; ?>
                  </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('role') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('role', trans('forms.create_user_label_role'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <select class="form-control" name="role" id="role">
                      <option value=""><?php echo e(trans('forms.create_user_ph_role')); ?></option>
                      <?php if($roles->count()): ?>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                    <label class="input-group-addon" for="name"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_role')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('role')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('role')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('password') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'))); ?>

                    <label class="input-group-addon" for="password"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_password')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('password_confirmation') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))); ?>

                    <label class="input-group-addon" for="password_confirmation"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_pw_confirmation')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <?php echo Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . trans('forms.create_user_button_text'), array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )); ?>


            <?php echo Form::close(); ?>


          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>