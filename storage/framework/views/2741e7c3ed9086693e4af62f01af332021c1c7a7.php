<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo Breadcrumbs::render('seen'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <section class="container">
            
            <?php echo $__env->make('content.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <section class="content">
                <div class="container-in">
                    <!-- Header -->
                    <div class="header-listing">
                        <h1>Просмотренные товары</h1>
                        <div class="goods-count">
                            <span>Товаров в категории</span>
                            <i class="sprite sprite-outline-min"><?php echo e($products->count()); ?></i>
                        </div>
                    </div>

                    <!-- Goods listing-->
                    <div class="goods-listing js-view" id="js-goods">
                        <?php if($products->count()): ?>
                            <?php echo $__env->make('catalog.products.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php else: ?>
                            Нет товаров
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            <section class="content-full-width">
                <?php echo app('arrilot.widget')->run('SubscribeWidget'); ?>
            </section>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>