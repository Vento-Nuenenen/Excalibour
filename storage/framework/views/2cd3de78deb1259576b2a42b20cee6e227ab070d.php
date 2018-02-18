<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <title>404 | Not Found.</title>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .title {
                font-size: 50px;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="container">
                <div class="content">
                    <div class="title"><h1>Not found.</h1></div>
                </div>
            </div>
        </div>
    </body>
</html>
