<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo Breadcrumbs::render('page', $page); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="container">
        <aside class="sidebar">
            
            <?php echo app('arrilot.widget')->run('BannerLeftWidget'); ?>
        </aside>
        <section class="content">
            <?php echo $page->content; ?>

        </section>

        <section class="content-full-width">
            <?php echo app('arrilot.widget')->run('SubscribeWidget'); ?>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>