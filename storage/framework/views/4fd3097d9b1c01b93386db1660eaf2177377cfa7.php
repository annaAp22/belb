<?php $__env->startSection('breadcrumbs'); ?>
    <?php if( isset($tag) ): ?>
        <?php echo Breadcrumbs::render('articles.tag', $tag); ?>

    <?php else: ?>
        <?php echo Breadcrumbs::render('articles'); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="container">
            <?php echo $__env->make('blocks.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <section class="content">
                <div class="container-in">
                    <div class="header-listing">

                        <h1><?php echo e(isset($tag) ? $tag->name : 'Статьи'); ?></h1>

                        <!-- Back to shopping link-->
                        
                            
                                
                                
                                
                            
                        
                    </div>

                    <div class="related-articles related-articles_content">
                        <div class="articles articles__recipes js-container-article">
                            <?php echo $__env->make('articles.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>

                    
                    <?php if($articles->currentPage() < $articles->lastPage()): ?>
                        <div class="page-navigation js-pagination-article">
                            <button class="btn btn_more js-action-link"
                                    data-url="<?php echo e(route('ajax.articles')); ?>"
                                    data-page="<?php echo e($articles->currentPage() + 1); ?>">
                                <span class="text">Показать больше</span>
                                <span class="count js-items-count">(<?php echo e($articles->total() - ($articles->currentPage() * $articles->perPage())); ?>)</span>
                                <i class="sprite sprite-arrow-down-blue2-min"></i>
                            </button>
                            <button class="btn btn_show-all js-action-link"
                                    data-url="<?php echo e(route('ajax.articles')); ?>"
                                    data-page="1">
                                <span>Показать все статьи</span>
                                <i class="sprite sprite-arrow-down-blue2-min"></i>
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