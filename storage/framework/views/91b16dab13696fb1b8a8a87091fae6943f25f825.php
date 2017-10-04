<div class="sidebar-banners">
    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="sidebar-banners__banner" href="<?php echo e(url($banner->url)); ?>" <?php echo e($banner->blank ? 'target="_blank"' : ''); ?>>
            <img src="<?php echo e($banner->uploads->img->url()); ?>" alt=""/>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>