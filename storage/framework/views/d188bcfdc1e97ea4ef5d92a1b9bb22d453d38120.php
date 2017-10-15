<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo Breadcrumbs::render('photos'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="container">
            <aside class="sidebar">
                <?php echo app('arrilot.widget')->run('TagsWidget'); ?>
                <?php echo app('arrilot.widget')->run('BannerLeftWidget'); ?>
            </aside>
            <section class="content">
                <div class="container-in">
                    <div class="header-listing">

                       <h1>Фотографии клиентов</h1>
                        
                    </div>

                    <div class="related-articles related-articles_content">
                        <div class="articles articles_news related-articles__articles js-container-photos">
                            <?php echo $__env->make('photos.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>

                    
                    <?php if($photos->currentPage() < $photos->lastPage()): ?>
                        <div class="page-navigation js-pagination-photos">
                            <button class="btn btn_more js-action-link"
                                    data-url="<?php echo e(route('ajax.photos')); ?>"
                                    data-page="<?php echo e($photos->currentPage() + 1); ?>">
                                <span class="text">Показать больше</span>
                                <span class="count js-items-count">(<?php echo e($photos->total() - ($photos->currentPage() * $photos->perPage())); ?>)</span>
                                <i class="sprite_main sprite_main-icon__arrow_green_down"></i>
                            </button>
                            <button class="btn btn_show-all js-action-link"
                                    data-url="<?php echo e(route('ajax.photos')); ?>"
                                    data-page="1">
                                <span>Показать все фотографии</span>
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