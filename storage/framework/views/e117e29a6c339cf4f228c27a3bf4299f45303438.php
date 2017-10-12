<div id="cart-modal" class="modal-box" style="display: inline-block;">
    <form action="<?php echo e(route('ajax.cart.update.quantity', ['id' => $product->id])); ?>" method="POST" class="js-form-ajax">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
        <input type="hidden" name="size" value="<?php echo e($size); ?>">

        <div class="cart-modal_top">
            <div class="form-modal_title">ТОВАР ДОБАВЛЕН В КОРЗИНУ!</div>
            <figure class="cart-modal_top_img align-table-wrap">
                <div><img src="<?php echo e($product->uploads->img->modal->url()); ?>"></div>
            </figure>
            <div class="cart-modal_top_name">
                <a href="<?php echo e(route('product', $product->sysname)); ?>"><?php echo e($product->name); ?></a>
                <div>Артикул: <span><?php echo e($product->sku); ?></span></div>
                <?php if($size): ?>
                    <div><strong>Размер: <span><?php echo e($size); ?></span></strong></div>
                <?php endif; ?>
            </div>
            <div class="cart-modal_top_counter">
                <div class="quantity">
                    <div class="quantity__handle quantity__handle_minus js-quantity" data-num="-1" > <
                    </div><input class="quantity__input js-quantity-input" data-submit name="quantity" value="<?php echo e($cnt); ?>" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                    <div class="quantity__handle quantity__handle_plus js-quantity" data-num="1" > >
                    </div>
                </div>
            </div>
            <div class="cart-modal_top_price">
                <span class="price"><?php echo e(number_format($product->price, 0, '.', ' ')); ?> ₽</span>
            </div>
        </div>
        <div class="cart-modal_bottom">
            <button data-fancybox-close class="btn btn_show-all">Продолжить покупки</button>
            <a href="<?php echo e(route('cart')); ?>" class="btn btn_green">ПЕРЕЙТИ К ОФОРМЛЕНИЮ</a>
        </div>
    </form>
    <button data-fancybox-close  class="modal-close">&#10006;</button>
</div>

