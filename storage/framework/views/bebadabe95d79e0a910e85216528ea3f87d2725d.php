<?php if(isset($page->photos) && $page->photos->count()): ?>
    <div class="contacts__gallery" id="#scheme">
        <div class="container-in">
            <?php $__currentLoopData = $page->photos->where('name', 'scheme'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($photo->uploads->img->url()); ?>" data-fancybox="group-0">
                    <img class="page-text__image" src="<?php echo e($photo->uploads->img->preview->url()); ?>" alt="">
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
