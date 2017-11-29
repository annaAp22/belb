<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo Breadcrumbs::render('cart'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="container" role="main">
        <form class="product-cart" action="<?php echo e(route('ajax.cart.edit')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <input id="is_fast" type="hidden" name="is_fast" value="0">
            <!-- Page header-->
            <div class="product-cart-header">
                <div class="product-cart-header__title">
                    <!-- H1 title-->
                    <h1 class="product-cart-header__h1">Моя корзина</h1>
                    <!-- Products count-->
                    <div class="product-cart-header__count">
                        <i class="sprite sprite-outline-min js-cart-quantity"><?php echo e($products->count()); ?></i>
                    </div>
                </div>
                <!-- Back to shopping link-->
                <a class="btn btn_back-link" href="#" onclick="location.href = document.referrer;">
                        <i class="sprite sprite-arrow-l-blue-min"></i><span>Назад к покупкам</span>
                </a>
            </div>
            <!-- Products list table-->
            <div class="product-cart-table">
                <div class="product-cart-table__header product-cart-table__row container-in">
                    <div class="product-cart-table__col product-cart-table__col_photo">Фото товара:
                    </div>
                    <div class="product-cart-table__col product-cart-table__col_name">Название товара:
                    </div>
                    <div class="product-cart-table__col product-cart-table__col_quantity">Количество:
                    </div>
                    <div class="product-cart-table__col product-cart-table__col_price">Цена за шт.:
                    </div>
                    <div class="product-cart-table__col product-cart-table__col_price-sum">Цена:
                    </div>
                    <div class="product-cart-table__col product-cart-table__col_remove">Удалить:
                    </div>
                </div>
                <div class="product-cart-table__body">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="product-cart-table__product product-cart-table__row container-in js-product" data-id="<?php echo e($product->id); ?>-<?php echo e($product->size); ?>">
                        <div class="product-cart-table__col product-cart-table__col_photo">
                            <a class="product-cart-table__image" href="<?php echo e(route('product', $product->sysname)); ?>"><img src="<?php echo e($product->uploads->img->cart->url()); ?>" alt="<?php echo e($product->name); ?>"></a>
                        </div>
                        <div class="product-cart-table__col product-cart-table__col_name">
                            <a class="product-cart-table__name" href="<?php echo e(route('product', $product->sysname)); ?>"><?php echo e($product->name); ?><span class="product-cart-table__art"> <?php echo e($product->sku); ?></span></a>
                            <?php if($product->size): ?>
                                <div class="product-cart-table__size">Размер:<span><?php echo e($product->size); ?></span></div>
                            <?php endif; ?>
                        </div>
                        <div class="product-cart-table__separator">
                        </div>
                        <div class="product-cart-table__col product-cart-table__col_quantity">
                            <div class="quantity">
                                <div class="quantity__handle quantity__handle_minus js-quantity" data-num="-1" > <
                                </div><input class="quantity__input js-quantity-input" name="products[<?php echo e($product->id); ?>][<?php echo e($product->size); ?>]" value="<?php echo e($product->count); ?>" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                                <div class="quantity__handle quantity__handle_plus js-quantity" data-num="1" > >
                                </div>
                            </div>
                        </div>
                        <div class="product-cart-table__separator product-cart-table__separator_md-up">
                        </div>
                        <div class="product-cart-table__col product-cart-table__col_price">
                            <div class="product-cart-table__price js-price" data-price="<?php echo e($product->price); ?>"><?php echo e(number_format($product->price, 0, '.', ' ')); ?> ₽
                            </div>
                        </div>
                        <div class="product-cart-table__separator">
                        </div>
                        <div class="product-cart-table__col product-cart-table__col_price-sum">
                            <div class="product-cart-table__price-sum js-amount" data-amount="<?php echo e($product->amount); ?>"><?php echo e(number_format($product->amount, 0, '.', ' ')); ?> ₽
                            </div>
                        </div>
                        <div class="product-cart-table__col product-cart-table__col_remove"><a class="product-cart-table__remove icon-fade js-action-link" data-url="<?php echo e(route('ajax.cart.remove', ['id' => $product->id, 'size' => $product->size])); ?>"><i class="sprite sprite-cross-blue-min normal"></i><i class="sprite sprite-cross-red-min active"></i></a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="product-cart-table__product product-cart-table__row">
                        Корзина пуста
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="product-cart-footer container-in">
                <?php if($products->count()): ?>
                    <!-- Checkout-->
                    <button class="btn btn_blue-border product-cart-footer__checkout js-cart-submit" data-is_fast="0">Купить сейчас
                    </button>
                    <!-- Quick buy-->
                    
                    <!-- Back to shopping link-->
                
                    <div class="product-cart-footer__cart-total">Итоговая стоимость:
                        <div class="product-cart-footer__price-total js-total-amount" data-total="<?php echo e($amount); ?>"><?php echo e(number_format($amount, 0, '.', ' ')); ?> ₽
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </form>
        <!-- Full width content-->
        <section class="content-full-width">
            <?php echo app('arrilot.widget')->run('SubscribeWidget'); ?>
        </section>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>