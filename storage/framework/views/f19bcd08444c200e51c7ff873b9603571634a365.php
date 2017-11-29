<?php if($products->count()): ?>
    <!-- Seen products-->
    <div class="products-carousel-block">
        <div class="products-carousel-block__title">Также смотрите:
        </div>
        <div class="products-carousel js-product-carousel">
            <button class="btn btn_carousel-control btn_carousel-control--belb"> <
                
            </button>
            <div class="products-carousel__wrap">
                <div class="products-carousel__track">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('catalog.products.list_item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <button class="btn btn_carousel-control btn_carousel-control--belb"> >
                
            </button>
        </div>
    </div>
<?php endif; ?>