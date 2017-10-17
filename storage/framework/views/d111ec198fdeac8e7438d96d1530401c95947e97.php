<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo Breadcrumbs::render('product', $product); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="container container_block" role="main">
        <section class="container-in product-detailed">
            <!-- H1 title md down-->
            <h1 class="product-detailed__title product-detailed__title_md-down">
                <?php echo e($product->name); ?>

            </h1>

            <!-- Article md down-->
            <div class="product-detailed__subtitle product-detailed__art product-detailed__art_md-down">
                <span>Артикул: <b><?php echo e($product->sku); ?></b></span>
                <?php if($product->stock): ?>
                    <span class="product-detailed__art-stock"><i class="sprite sprite-tick-icon-blue-min"></i><span>В наличии</span></span>
                <?php endif; ?>
            </div>

            <!-- Image gallery-->
            <div class="product-gallery product-detailed__gallery" id="js-product-gallery">
                <div class="product-gallery__navigation" id="js-product-gallery-nav">
                    <button class="btn btn_carousel-control">
                        <i class="sprite sprite-arrow-up-min"></i>
                    </button>
                    <div class="product-gallery__wrap">
                        <div class="product-gallery__track">
                            <div class="product-gallery__thumb active js-gallery-thumb">
                                <img src="<?php echo e($product->uploads->img->modal->url()); ?>" alt="<?php echo e($product->name); ?>" role="presentation"/>
                            </div>
                            <?php if($product->video_url): ?>
                                <div class="product-gallery__thumb product-gallery__thumb_video js-gallery-thumb"
                                     style="background-image: url('https://img.youtube.com/vi/<?php echo e($product->video_code); ?>/1.jpg')">
                                    <div class="product-gallery__thumb_video__play"></div>
                                </div>
                            <?php endif; ?>
                            <?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="product-gallery__thumb js-gallery-thumb">
                                    <img src="<?php echo e($photo->uploads->img->modal->url()); ?>" alt="<?php echo e($product->name); ?>" role="presentation"/>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <button class="btn btn_carousel-control down">
                        <i class="sprite sprite-arrow-up-min"></i>
                    </button>
                </div>
                <div class="product-gallery__image-wrap">
                    <a class="product-gallery__image-link active js-gallery-big" data-fancybox="group" href="<?php echo e($product->uploads->img->url()); ?>">
                        <img class="product-gallery__image" src="<?php echo e($product->uploads->img->detail->url()); ?>" alt="<?php echo e($product->name); ?>" role="presentation"/>
                    </a>

                    <?php if($product->video_url): ?>
                        <a class="product-gallery__image-link js-gallery-big js-gallery-thumb" data-fancybox="group" href="<?php echo e($product->video_url); ?>">
                            <img class="product-gallery__video" src="https://img.youtube.com/vi/<?php echo e($product->video_code); ?>/maxresdefault.jpg" alt="">
                            <div class="product-gallery__thumb_video__play"></div>
                        </a>
                    <?php endif; ?>

                    <?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="product-gallery__image-link js-gallery-big" data-fancybox="group" href="<?php echo e($photo->uploads->img->url()); ?>">
                            <img class="product-gallery__image" src="<?php echo e($photo->uploads->img->detail->url()); ?>" alt="<?php echo e($product->name); ?>" role="presentation"/>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php echo $__env->make('catalog.products.labels', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <!-- Add to wishlist-->
                    <span class="wishlist js-hover-notice js-toggle-active js-action-link<?php echo e(in_array($product->id, $defer) ? ' active' : ''); ?>"
                          data-url="<?php echo e(route('ajax.product.defer', ['id' => $product->id])); ?>">
                        <span class="icon-fade">
                            <i class="sprite sprite-favorite-heart-min normal"></i>
                            <i class="sprite sprite-favorite-heart-active active"></i>
                        </span>
                        <i class="sprite sprite-tick-icon-blue-min done"></i>
                        <!-- Popup-->
                        <span class="popup-notice popup-notice_wishlist">
                            <span class="popup-notice__triangle">▼</span>
                            <i class="sprite_main sprite_main-icon__popup_info"></i>
                            <span class="popup-notice__text">Добавить товар в закладки</span>
                            <span class="popup-notice__text done">Товар добавлен в закладки!</span>
                        </span>
                    </span>
                </div>
            </div>

            <div class="product-detailed__details">
                <div class="container-in">

                    <form class="product-detailed__column product-detailed__column--left js-form-ajax" action="<?php echo e(route('ajax.cart.add', ['id' => $product->id, 'cnt' => 1])); ?>" method="post">

                        <?php echo e(csrf_field()); ?>


                        <!-- Article-->
                        <div class="product-detailed__subtitle product-detailed__art product-detailed__art_lg-up">
                            <span>Артикул: <b><?php echo e($product->sku); ?></b></span>
                            <?php if($product->stock): ?>
                                <span class="product-detailed__art-stock"><i class="sprite sprite-tick-icon-blue-min"></i><span>В наличии</span></span>
                            <?php endif; ?>
                        </div>

                        <!-- Price-->
                        <div class="product-detailed__price product__price">
                            <?php if($product->originalPrice): ?>
                                <i class="old-price">
                                <span><?php echo e(number_format($product->originalPrice, 0, '.', ' ')); ?> руб</span>
                                </i>
                            <?php endif; ?>
                            <span class="current"><b><?php echo e(number_format($product->price, 0, '.', ' ')); ?></b> руб</span>
                        </div>

                        <?php echo $__env->make('catalog.products.rating', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="product-detailed__counter">
                            
                            <?php 
                                $size =0;
                                 $cnt = session()->get('products.cart.'.$product->id.'.'.$size.'.cnt')?: 1;
                             ?>
                            <div class="quantity">
                                <div class="quantity__handle quantity__handle_minus js-quantity" data-num="-1" > <
                                </div><input class="quantity__input js-quantity-input"  name="quantity" value="<?php echo e($cnt); ?>" type="text" />
                                <div class="quantity__handle quantity__handle_plus js-quantity" data-num="1" > >
                                </div>
                            </div>
                        </div>
                        
                            
                            
                            
                        
                                
                                
                        

                            
                            
                                
                                    
                                    
                                
                            
                                
                                    
                                    
                                
                            
                            <input type="hidden" name="size" value="0">
                        <!-- Buy-->
                        <!-- Quick buy-->
                        <button id="quick-buy-btn" name="is_fast" value="1" class="btn btn_blue-border product-detailed__btn product-detailed__btn_quick js-add-to-cart" onclick="document.getElementById('is_fast').value = 1;">Быстрая покупка</button>
                        <input id="is_fast" type="hidden" name="is_fast" value="0">
                            <!-- Cart-->
                        <button class="btn btn_buy product__buy product-detailed__btn product-detailed__btn_buy js-add-to-cart<?php echo e(session()->has('products.cart.'. $product->id) ? ' active' : ''); ?>"  onclick="document.getElementById('is_fast').value = 0;">
                        <span class="put">
                            
                            <span>В корзину</span>
                        </span>
                            <a class="done" href="<?php echo e(route('cart')); ?>">
                                
                                <span>В корзину</span>
                            </a>
                        </button>

                        
                        
                            
                            
                                
                            
                            
                            
                            
                                
                            
                            
                            
                            
                                
                            
                            
                            
                            
                                
                            
                        
                    </form>


                    <div class="product-detailed__column product-detailed__column--rigth">
                        <!-- Description-->
                        <div class="product-detailed__subtitle product-detailed__subtitle_des">Характеристики:</div>
                        <div class="description-scroll product-detailed__description">
                            
                            <div class="description-scroll__body">
                                <!-- Color-->
                                <?php 
                                    $main_color = $product->attributes->where('name', 'Основной цвет')->first();
                                    $sub_color = $product->attributes->where('name', 'Цвет вставок')->first();
                                    $country_of_origin = $product->attributes->where('name', 'Страна производства')->first();
                                 ?>
                                <div class="description-scroll__color-wrap">
                                    <?php if($main_color): ?>
                                        <span class="description-scroll__param-title description-scroll__param-title_strong">
                                            <span>Цвет основы:</span>
                                            <span class="description-scroll__color" style="background-color:<?php echo e($main_color->pivot->value); ?>;" title="<?php echo e($main_color->color); ?>"></span>
                                        </span>
                                    <?php endif; ?>
                                    <?php if($sub_color): ?>
                                        <span class="description-scroll__param-title description-scroll__param-title_strong">
                                            <span>Цвет вставок:</span>
                                            <span class="description-scroll__color" style="background-color:<?php echo e($sub_color->pivot->value); ?>;" title="<?php echo e($sub_color->color); ?>"></span>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <!-- Brand-->
                                
                                    
                                        
                                        
                                    
                                
                                <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="description-scroll__param-title description-scroll__mt"><strong><?php echo e($item->name); ?>:</strong><span class="description-scroll__param-value"><?php echo e($item->pivot->value); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                
                                
                                
                                
                            
                                
                                    
                                    
                                
                            
                                
                                    
                                    
                                    
                                
                                <!-- Other description-->
                                
                                    
                                
                            </div>
                        </div>
                        <!-- Warranty-->
                        
                            
                                
                                
                                    
                                    
                                    
                                    
                                
                            
                            
                                
                                
                                    
                                    
                                    
                                    
                                
                            
                        
                        
                        <div class="product-delivery product-detailed__delivery js-toggle-active">
                            <div class="product-delivery__wrap">
                                <div class="product-delivery__title"><i class="sprite sprite-money-tool-min"></i><i>Способы оплаты</i><i class="sprite sprite-arrow-up-blue-min"></i>
                                </div>
                                <div class="product-delivery__note">Потребление отталкивает социометрический выставочный стенд.
                                </div>
                            </div>
                            <div class="product-delivery__hidden">
                                Потребление отталкивает социометрический выставочный стенд.
                            </div>
                        </div>
                        <!-- Delivery-->
                        <div class="product-delivery product-delivery--deliv product-detailed__delivery js-toggle-active">
                            <div class="product-delivery__wrap">
                                <div class="product-delivery__title"><i class="sprite sprite-delivery-icon-min"></i><i>Доставка</i>
                                    <i class="sprite sprite-arrow-up-blue-min"></i>
                                </div>
                                <div class="product-delivery__note"><?php echo e($user_city == 'Москва' ? 'Уже завтра!' : 'Почтой'); ?>

                                </div>
                            </div>

                            <div class="product-delivery__hidden">
                                <div class="product-delivery__city js-product-delivery__city"><span>Ваш город:</span><span class=""><?php echo e($user_city); ?><i class="sprite sprite-arrow-up-blue-min"></i></span>
                                </div>
                                <?php if( $user_city == 'Москва' ): ?>
                                    <div class="product-delivery__cost"><span>Стоимость:</span><span>Курьером: от 300 руб.<br/>При заказе от 6 000 руб<br/>Бесплатно</span></div>
                                <?php else: ?>
                                    <div class="product-delivery__cost"><span>Стоимость:</span><span> от 300 руб.</span></div>
                                <?php endif; ?>
                                <div class="product-delivery__link"><a href="<?php echo e(route('delivery')); ?>">Подробнее о доставке по России</a>
                                </div>
                                <div class="product-delivery__store"><i class="sprite sprite-locate-places-min"></i><a href="<?php echo e(route('contacts')); ?>">Магазин в Москве</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <?php echo $__env->make('catalog.products.tabs.exposition', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('catalog.products.tabs.reviews', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            

        </section>

        <section class="content-full-width">

            

            

            <?php echo app('arrilot.widget')->run('ViewProductsWidget', ['product_id' => $product->id]); ?>
            
            <?php echo $__env->make('looks.product_detailed', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo app('arrilot.widget')->run('SimilarProductsWidget', ['product' => $product]); ?>
            <?php echo app('arrilot.widget')->run('SubscribeWidget'); ?>
        </section>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>