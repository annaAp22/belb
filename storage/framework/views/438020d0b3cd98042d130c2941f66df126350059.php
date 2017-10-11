<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if( isset($tag) ): ?>
        <a href="<?php echo e(route('tag.article', ['sysname' => $item->sysname, 'tag_sysname' => $tag->sysname])); ?>" class="articles-itm">
    <?php else: ?>
        <a href="<?php echo e(route('article', ['sysname' => $item->sysname])); ?>" class="articles-itm">
    <?php endif; ?>

        <div class="articles-itm__image">
            <div class="img-wrapper">
                <div class="img" style="background-image:url( '<?php echo e($item->uploads->img->small->url()); ?>' )"></div>
            </div>
        </div>
        <div class="articles-itm__content">
            <h4 class="articles-itm__caption"><?php echo e($item->name); ?></h4>
            <div class="articles-itm__text"><?php echo e($item->descr); ?></div>
            <p>Читать статью</p>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
