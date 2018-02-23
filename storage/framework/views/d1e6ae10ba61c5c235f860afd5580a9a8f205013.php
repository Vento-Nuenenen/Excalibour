<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only"><?php echo trans('titles.toggleNav'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <?php echo config('app.name', Lang::get('titles.app')); ?>

            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            
            <ul class="nav navbar-nav">
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Administration <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li <?php echo e(Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'class=active' : null); ?>><?php echo HTML::link(url('/users'), Lang::get('titles.adminUserList')); ?></li>
                            <li <?php echo e(Request::is('users/create') ? 'class=active' : null); ?>><?php echo HTML::link(url('/users/create'), Lang::get('titles.adminNewUser')); ?></li>
                            <li <?php echo e(Request::is('import/user') ? 'class=active' : null); ?>><?php echo HTML::link(url('/import/user'), 'Benutzer importieren'); ?></li>
                            <li <?php echo e(Request::is('groups') ? 'class=active' : null); ?>><?php echo HTML::link(url('/groups/'), 'Gruppen verwalten'); ?></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasRole('admin|user')): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Management <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li <?php echo e(Request::is('tn/points') ? 'class=active' : null); ?>><?php echo HTML::link(url('/tn/points'), 'Punkte vergeben'); ?></li>
                            <li <?php echo e(Request::is('print/certificate') ? 'class=active' : null); ?>><?php echo HTML::link(url('/print/certificate'), 'Exer Gratulation export'); ?></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>

            
            <ul class="nav navbar-nav navbar-right">
                
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>"><?php echo trans('titles.login'); ?></a></li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                            <?php if((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1): ?>
                                <img src="<?php echo e(Auth::user()->profile->avatar); ?>" alt="<?php echo e(Auth::user()->scoutname); ?>" class="user-avatar-nav">
                            <?php else: ?>
                                <div class="user-avatar-nav"></div>
                            <?php endif; ?>

                            <?php echo e(Auth::user()->scoutname ? Auth::user()->scoutname : Auth::user()->first_name); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li <?php echo e(Request::is('profile/'.Auth::user()->id, 'profile/'.Auth::user()->id . '/edit') ? 'class=active' : null); ?>>
                                <?php echo HTML::link(url('/profile/'.Auth::user()->id), trans('titles.profile')); ?>

                            </li>
                            <li>
                                <a href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <?php echo trans('titles.logout'); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
