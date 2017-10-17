<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo Breadcrumbs::render('search', $text); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>

        <div class="container">

            
            <?php echo $__env->make('content.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <section class="content">
                <div class="container-in">

                    <div class="header-listing">
                        <h1>Результаты поиска</h1>
                        <div class="goods-count">
                            <span>Товаров найдено</span>
                            <i class="sprite sprite-outline-min"><?php echo e(isset($products)?$products->total():0); ?></i>
                        </div>
                    </div>

                    <!-- Goods listing-->
                    <div class="goods-listing js-container-search">
                        <?php if(isset($products) && $products->count()): ?>
                            <?php echo $__env->make('catalog.products.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php else: ?>
                            <p class="col-24">Поиск не принес результатов. Попробуйте поискать что-нибудь другое.</p>
                        <?php endif; ?>
                    </div>

                    
                    <?php if(isset($products) && $products->currentPage() < $products->lastPage()): ?>
                        <div class="page-navigation js-pagination-search">
                            <button class="btn btn_more js-action-link"
                                    data-text="<?php echo e($text); ?>"
                                    data-url="<?php echo e(route('search')); ?>"
                                    data-page="<?php echo e($products->currentPage() + 1); ?>">
                                <span class="text">Показать больше</span>
                                <span class="count js-items-count">(<?php echo e($products->total() - ($products->currentPage() * $products->perPage())); ?>)</span>
                                <i class="sprite_main sprite_main-icon__arrow_green_down"></i>
                            </button>
                            <button class="btn btn_show-all js-action-link"
                                    data-text="<?php echo e($text); ?>"
                                    data-url="<?php echo e(route('search')); ?>"
                                    data-page="1">
                                <span>Показать все товары</span>
                                <i class="sprite_main sprite_main-icon__arrow_green_down"></i>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
            <section class="content-full-width">
                <?php echo app('arrilot.widget')->run('SubscribeWidget'); ?>
            </section>

        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>