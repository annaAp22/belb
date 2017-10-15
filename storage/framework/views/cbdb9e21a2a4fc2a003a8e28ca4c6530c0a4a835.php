<?php if(isset($photos)): ?>
    <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="article-preview article-preview_news article-preview_photo articles__article">
            <a class="article-preview__image" href="<?php echo e($photo->uploads->img->original->url()); ?>" data-fancybox="group" data-caption="<?php echo e($photo->caption); ?>"><img src="<?php echo e($photo->uploads->img->detailed->url()); ?>"/></a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>