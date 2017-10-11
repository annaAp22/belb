<?php if(isset($page->photos) && $page->photos->count()): ?>
    <div class="contacts__gallery">
        <div class="container-in">
            <?php $__currentLoopData = $page->photos->filter(function ($item) {
            return ($item['name'] != 'scheme' && $item['name'] != 'map');
            }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($photo->uploads->img->url()); ?>" data-fancybox="group-1">
                    <img class="page-text__image" src="<?php echo e($photo->uploads->img->preview->url()); ?>" alt="">
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
