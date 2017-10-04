<?php 
    $deferred = session()->get('products.defer');
    $bookmarked = $deferred ? array_key_exists($product->id, $deferred) : false;
 ?>

<div <?php if(isset($product->lastOnPrevPage)): ?> id="scrollTarget" <?php endif; ?> class="product">
    <a class="product__image" href="<?php echo e(route('product', $product->sysname)); ?>">
        <!-- Image-->
        <img src="<?php echo e($product->uploads->img->listing->url()); ?>"/>

        <?php echo $__env->make('catalog.products.labels', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </a>

    <!-- Add to wishlist-->
    <div class="product__wishlist wishlist js-hover-notice js-toggle-active js-action-link<?php echo e(in_array($product->id, $defer) ? ' active' : ''); ?>"
         data-url="<?php echo e(route('ajax.product.defer', ['id' => $product->id])); ?>">
        <div class="icon-fade">
            <i class="sprite sprite-favorite-heart-min normal"></i>
            <i class="sprite sprite-favorite-heart-active active"></i>
        </div>
        <i class="sprite sprite-tick-icon-blue-min done"></i>

        <!-- Popup-->
        <div class="popup-notice popup-notice_wishlist">
            <div class="popup-notice__triangle">▼</div>
            <i class="sprite_main sprite_main-icon__popup_info"></i>
            <div class="popup-notice__text">Добавить товар в закладки</div>
            <div class="popup-notice__text done">Товар добавлен в закладки!</div>
        </div>
    </div>

    <!-- Description-->
    <form class="product__description js-form-ajax" action="<?php echo e(route('ajax.cart.add', ['id' => $product->id, 'cnt' => 1])); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <a class="product__name" href="<?php echo e(route('product', $product->sysname)); ?>"><?php echo $product->getWrapTagInName(); ?></a>
        <div class="product__price">
           <span class="current"><?php echo e(number_format($product->price, 0, '.', ' ')); ?> ₽</span>
            <?php if($product->originalPrice): ?>
                <i class="sprite sprite-product__old-price old-price"><span><?php echo e(number_format($product->originalPrice, 0, '.', ' ')); ?> ₽</span></i>
            <?php endif; ?>
        </div>
        <input type="hidden" name="size" value="0">
        <button class="btn btn_buy product__buy product__buy--list js-add-to-cart<?php echo e(session()->has('products.cart.'. $product->id) ? ' active' : ''); ?>">
                        <span class="put"><i class="sprite sprite-cart-icon-white-min"></i>
                            
                        </span>
            <a class="done" href="<?php echo e(route('cart')); ?>">
                <i class="sprite sprite-product__basket_done"></i>
                
            </a>
        </button>
        

            
            
                
            
                

                
            

                
                
                        
                            
                        
                        
                            
                            
                        
                
            
        </form>
    </div>
