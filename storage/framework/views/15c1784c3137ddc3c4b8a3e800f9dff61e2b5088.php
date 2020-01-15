<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script>
            window.__user__ = <?php echo json_encode($user, 15, 512) ?>
        </script>
       <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    </body>
</html><?php /**PATH /home/hiep/Desktop/Laravel_trick/laravel_learn/resources/views/welcome.blade.php ENDPATH**/ ?>