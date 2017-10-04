<?php if(isset($products)): ?>
    <div class="products-carousel-2 product-set-goods-large js-product-slider">
        <button class="btn btn_carousel-control">
            <i class="sprite_main sprite_main-icon_arrow_gray_up"></i>
        </button>
        <div class="products-carousel__wrap">
            <div class="products-carousel__track">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('catalog.products.kit_item', ['product' => $prod], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>
        <button class="btn btn_carousel-control">
            <i class="sprite_main sprite_main-icon_arrow_gray_up"></i>
        </button>
    </div>
<?php endif; ?>
