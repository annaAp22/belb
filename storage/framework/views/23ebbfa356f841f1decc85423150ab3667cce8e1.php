<?php $__env->startSection('breadcrumbs'); ?>
    <?php 
    $root = null;
    if(isset($category)) $root = $category;
    if(isset($brand)) $root = $brand;
    if(isset($tag)) $root = $tag;
     ?>
    <?php if(isset($page)): ?>
        <?php echo Breadcrumbs::render('new_hit_act', $page); ?>

    <?php else: ?>
        <?php echo Breadcrumbs::render('catalog', $root); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="container">
            <aside class="sidebar">
                <?php 
                $filters['paginator'] = $products;
                $filters['category'] = isset($category) ? $category : null;
                $filters['brand'] = isset($brand) ? $brand : null;
                $filters['tag'] = isset($tag) ? $tag : null;
                if(isset($category)) {
                $filters['filters'] = $category->filters;
                }
                if(isset($tag)) {
                $filters['filters'] = $tag->filters;
                }
                $filters['sort'] = isset($filters['sort'])?$filters['sort']:'sort';
                 ?>

                <?php if(isset($filters['productsCount']) and $filters['productsCount'] > 0): ?>
                   <?php echo $__env->make('catalog.filters', $filters, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>

                 
                <?php if(isset($category) && isset($parent_zero_id)): ?>
                    <?php echo app('arrilot.widget')->run('ListingCatalog', ['current' => $category,'type' => 'belb', 'parent_id' => $parent_zero_id]); ?>
                <?php else: ?>
                    <?php echo app('arrilot.widget')->run('ListingCatalog', ['type' => 'belb']); ?>
                <?php endif; ?>
                <?php if(isset($category)): ?>
                    <?php echo app('arrilot.widget')->run('TagsWidget', ['category_id' => $category->id, 'category' => $category]); ?>
                <?php elseif(isset($tag)): ?>
                    <?php echo app('arrilot.widget')->run('TagsWidget', ['tag_id' => $tag->id]); ?>
                <?php endif; ?>
                <?php if(isset($category)): ?>
                    <?php echo app('arrilot.widget')->run('BannerLeftWidget', ['sex' => $category->getRootCategorySysname()]); ?>
                <?php else: ?>
                    <?php echo app('arrilot.widget')->run('BannerLeftWidget'); ?>
                <?php endif; ?>
            </aside>
            <section class="content">
                <div class="container-in">
                    <div class="header-listing">
                        <?php if(isset($category)): ?>
                            <h1><?php echo e($category->name); ?></h1>
                        <?php elseif(isset($tag)): ?>
                            <h1><?php echo e($tag->name); ?></h1>
                        <?php elseif(isset($page)): ?>
                            <h1><?php echo e($page->name); ?></h1>
                        <?php endif; ?>
                        <div class="goods-count">
                            <span>Товаров в категории</span>
                            <i class="sprite sprite-outline-min"><?php echo e($products->totalCount); ?></i>
                        </div>
                    </div>

                    
                    <?php if( isset($category->offers) && $category->offers->count() ): ?>
                        <?php  $offer = $category->offers->first();  ?>
                        <a class="banner-look" href="<?php echo e($offer->url ?: ''); ?>" target="_blank">
                            <img class="banner-look__image banner-look__image_xl" src="<?php echo e($offer->uploads->image->lg->url()); ?>" alt="" role="presentation"/>
                            
                        </a>
                    <?php endif; ?>
                            <!-- Show filters button md down-->
                    <button class="btn btn_filter js-toggle-sidebar" data-target=".js-filter-visible">Фильтры подбора товаров</button>
                    <!-- Sorting and view-->
                    <div class="goods-sorting"><i class="sprite sprite-listing__filter"></i><span>Сортировать товары:</span>
                        <?php 
                        $sortNames = array(
                        'sort' => 'По умолчанию',
                        'expensive' => 'Сначала дороже',
                        'cheaper' => 'Сначала дешевле',
                        'hit' => 'По популярности',
                        'act' => 'По акциям',
                        'new' => 'По новинкам',
                        )
                         ?>
                        <div class="sorting-select js-toggle-active js-select"><span class="js-selected"><?php echo e($sortNames[$filters['sort']]); ?></span><i class="sprite sprite-arrow-down-blue2-min"></i>
                            <div class="sorting-select__dropdown">
                                <?php $__currentLoopData = $sortNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="sorting-select__option js-option js-sort" data-sort="<?php echo e($key); ?>"><?php echo e($value); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    
                    
                        
                        
                        
                        
                    

                    <!-- Look md down-->
                    <a class="btn btn_look" href="#">Подобрать<strong> Look</strong></a>

                    <!-- Goods listing-->
                    <div class="goods-listing js-view" id="js-goods">
                        <?php if($products->count()): ?>
                            <?php echo $__env->make('catalog.products.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php else: ?>
                            Нет товаров
                        <?php endif; ?>
                    </div>

                    
                    <?php if($products->currentPage() < $products->totalPages): ?>
                        <div class="page-navigation">
                            <button class="btn btn_more js-pagination" data-all="false">
                                <span class="text">Еще товаров</span>
                                <span class="count js-goods-count">(<span><?php echo e($products->totalCount - ($products->currentPage() * $products->perPage())); ?></span>)</span>
                                
                            </button>
                            
                                
                                
                            
                        </div>
                    <?php endif; ?>

                </div>
            </section>

        <section class="content-full-width">
                <!-- Page text-->
                <article class="page-text">
                    <?php if(isset($category)): ?>
                        <?php echo $category->text; ?>

                    <?php elseif(isset($tag)): ?>
                        <?php echo $tag->text; ?>

                    <?php endif; ?>
                </article>

                <!-- Related articles-->
                <div class="related-articles">

                </div>

                <?php if(isset($category)): ?>
                    <?php echo app('arrilot.widget')->run('ArticlesWidget', ['category_id' => $category->id,'full' => 1]); ?>
                <?php elseif(isset($tag)): ?>
                    <?php echo app('arrilot.widget')->run('ArticlesWidget', ['tag_id' => $tag->id ,'full' => 1]); ?>
                <?php endif; ?>
            
                <?php echo app('arrilot.widget')->run('adviceWidget', ['tag_id' => 1]); ?>
                
            </section>
        </div>
    </main>
    <div class="colored-bg__f3f2f2">
        <div class="container">
            <?php echo app('arrilot.widget')->run('SubscribeWidget'); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>