<?php if($breadcrumbs): ?>
    <div class="breadcrumbs">
        <div class="container">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($breadcrumb->first): ?>
                    <a class="breadcrumbs__item breadcrumbs__item_first" href="<?php echo e($breadcrumb->url); ?>">
                        <i class="sprite sprite-home-icon-min"></i>
                        <span><?php echo e($breadcrumb->title); ?></span>
                    </a>
                <?php elseif(!$breadcrumb->last): ?>
                    <a class="breadcrumbs__item" href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a>
                <?php else: ?>
                    <div class="breadcrumbs__item breadcrumbs__item_current">
                        <?php echo e($breadcrumb->title); ?>

                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
