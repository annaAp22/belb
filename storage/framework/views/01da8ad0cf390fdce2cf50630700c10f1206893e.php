<div class="look-book-slider js-look-book">
    <div class="look-book-slider__wrap">
        <div class="look-book-slider__track">
            <?php $__currentLoopData = $looks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $look): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="look-book-slider__item <?php echo e($key == 0 ? "active" : ""); ?>">
                    <form class="look-book__buy-package-form js-form-ajax" action="<?php echo e(route('ajax.cart.multiple.add')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="size_choose" value="1">
                        <?php $__currentLoopData = $look->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="hidden" name="product_ids[]" value="<?php echo e($product->id); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <button class="btn btn_green btn-look-book_buy">
                            <i class="sprite_main sprite_main-product__basket"></i>
                            <span>Купить весь комплект</span>
                        </button>
                    </form>


                    
                    <?php $__currentLoopData = $look->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                        $top = 100*$product->position->top/$look->uploads->image->normal->height;
                        $left = 100*$product->position->left/$look->uploads->image->normal->width;
                         ?>
                        <div class="moving-dot js-moving-dot" id="js-moving-dot-<?php echo e($key.$ind); ?>" style="top:<?php echo e($top); ?>%;left:<?php echo e($left); ?>%">
                            <span class="moving-dot__plus <?php echo e($top > 60 ? 'bottom' : 'top'); ?> <?php echo e($left > 50 ? "left" : "right"); ?> js-toggle-active-target" data-target="#js-moving-dot-<?php echo e($key.$ind); ?>" data-reset=".js-moving-dot" data-toggle="0">+</span>

                            
                            <form class="look-book-product <?php echo e($top > 60 ? 'bottom' : 'top'); ?> <?php echo e($left > 50 ? "left" : "right"); ?> js-form-ajax" action="<?php echo e(route('ajax.cart.add', ['id' => $product->id, 'cnt' => 1])); ?>" method="post">
                                <?php echo e(csrf_field()); ?>

                                
                                <a class="product__name" href="<?php echo e(route('product', $product->sysname)); ?>"><?php echo $product->getWrapTagInName(); ?></a>

                                
                                <?php if(count($product->sizes)): ?>
                                    <?php echo $__env->make('catalog.products.sizes', ['class' => ' product__size'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php else: ?>
                                    <div class="product__size-hidden">
                                        <input type="hidden" name="size" value="0">
                                    </div>
                                <?php endif; ?>

                                
                                <button class="btn btn_green product__buy js-add-to-cart<?php echo e(session()->has('products.cart.'. $product->id) ? ' active' : ''); ?>">
                                            <span class="put"><i class="sprite_main sprite_main-product__basket"></i>
                                                <span>В корзину</span>
                                            </span>
                                    <a class="done" href="<?php echo e(route('cart')); ?>">
                                        <i class="sprite_main sprite_main-product__basket_done"></i>
                                        <span>Добавлено</span>
                                    </a>
                                </button>
                            </form>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <img class="look-book-slider__banner look-book-slider__banner_md-up" src="<?php echo e($look->uploads->image->normal->url()); ?>" alt="" role="presentation"/>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <button class="btn btn_carousel-control left" disabled="disabled">
        <i class="sprite_main sprite_main-icon_arrow_gray_up"></i>
    </button>
    <button class="btn btn_carousel-control right" disabled="disabled">
        <i class="sprite_main sprite_main-icon_arrow_gray_up"></i>
    </button>
</div>