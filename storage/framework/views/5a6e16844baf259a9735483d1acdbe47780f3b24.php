<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if( isset($tag) ): ?>
        <a href="<?php echo e(route('tag.article', ['sysname' => $item->sysname, 'tag_sysname' => $tag->sysname])); ?>" class="recipe-item">
    <?php else: ?>
        <a href="<?php echo e(route('article', ['sysname' => $item->sysname])); ?>" class="recipe-item">
    <?php endif; ?>
        <div class="img-wrapper">
            <div class="img" style="background-image:url( '<?php echo e($item->uploads->img->small->url()); ?>' )"></div>
        </div>
        <div class="caption"><?php echo e($item->name); ?></div>
        <div class="text"><?php echo e($item->descr); ?></div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
