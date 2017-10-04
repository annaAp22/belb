<div class="catalog-dropdown__column">
    <div class="catalog-dropdown__title"><?php echo e($cat_name); ?></div>
    <ul class="ul ul_green-hover">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li data-text="<?php echo e($subcat->name); ?>">
                <a href="<?php echo e(route('catalog', $subcat->sysname)); ?>"><?php echo e($subcat->name); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
