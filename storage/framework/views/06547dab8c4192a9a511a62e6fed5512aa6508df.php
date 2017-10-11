<div class="catalog-dropdown__column-fake">
    <div class="catalog-dropdown__title-fake"> </div>
    <ul class="ul ul_green-hover">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li data-text="<?php echo e($subcat->name); ?>">
                <a href="<?php echo e(route('catalog', $subcat->sysname)); ?>"><?php echo e($subcat->name); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
