<div class="navigation-footer__column navigation-footer__column_dropdown">
    <div class="navigation-footer__title js-toggle-active"><?php echo e($config['page_title']); ?><i class="sprite sprite-arrow-down-min"></i>
    </div>
    <ul>
        <?php echo $__env->make('blocks.info-additional', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(route('page', $page->sysname)); ?>"><?php echo e($page->name); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

