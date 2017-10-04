<div class="product-set-item">

	
	<!-- Order form-->
	<form class="product-set-item__description js-form-ajax" action="<?php echo e(route('ajax.cart.add', ['id' => $product->id, 'cnt' => 1])); ?>" method="post">
		<?php echo e(csrf_field()); ?>


        <!-- Image-->
        <a class="product-set-item__image" href="<?php echo e(route('product', $product->sysname)); ?>">
            <img src="<?php echo e($product->uploads->img->kit->url()); ?>"/>
            <?php if(count($product->sizes)): ?>
                <?php echo $__env->make('catalog.products.sizes', ['class' => ' product-set-item__size'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
                <input type="hidden" name="size" value="0">
            <?php endif; ?>
        </a>

		<!-- Name-->
		<a class="product-set-item__name" href="<?php echo e(route('product', $product->sysname)); ?>"><?php echo e($product->name); ?></a>

		<!-- Price-->
		<div class="product-set-item__price product__price">
			<span class="current"><?php echo e(number_format($product->price, 0, '.', ' ')); ?> ₽</span>
            <?php if($product->originalPrice): ?>
                <i class="old-price"><span><?php echo e(number_format($product->originalPrice, 0, '.', ' ')); ?> ₽</span></i>
            <?php endif; ?>
		</div>



		<!-- Add-->
        <button class="btn btn_green-border product-set-item__buy js-add-to-cart<?php echo e(session()->has('products.cart.'. $product->id) ? ' active' : ''); ?>">
            <span>Добавить</span>
            <span>В корзине</span>
        </button>
	</form>
</div>
