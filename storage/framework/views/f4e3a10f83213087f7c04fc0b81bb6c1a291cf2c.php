<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo Breadcrumbs::render('reviews'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="container">
        <div class="wrap-block-title">
            <h1 class="catalog-title">
                Отзывы наших клиентов:
            </h1>
        </div>
        

        <div id="js-vk_reviews"></div>

        <section class="content-full-width">
            <?php echo app('arrilot.widget')->run('SubscribeWidget'); ?>
        </section>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>