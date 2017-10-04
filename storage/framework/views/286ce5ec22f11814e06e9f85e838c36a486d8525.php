<!DOCTYPE html>
<html lang="ru">
<head>
	<?php echo Meta::render(); ?>

    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="yandex-verification" content="c0c2b889beb7fe31" />
    <?php echo $__env->make('blocks.favicons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<link rel="stylesheet" href="<?php echo e(elixir('css/app.css')); ?>">
</head>
<body>

    <?php echo $__env->make('blocks.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="main-wrapper js-sidebar-open" id="main">
        <?php echo $__env->make('blocks.header.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php $__env->startSection('breadcrumbs'); ?>
        <?php echo $__env->yieldSection(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('blocks.footer.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    
    <div class="hidden" id="loader">
        <div class="loader-bg"></div>
        <div class="loader"></div>
    </div>

    
    

    <script src="<?php echo e(elixir('js/vendor.js')); ?>"></script>
    <script src="<?php echo e(elixir('js/lib.js')); ?>"></script>
	<script src="<?php echo e(elixir('js/app.js')); ?>"></script>

    
    
    
    
    

    
</body>
</html>