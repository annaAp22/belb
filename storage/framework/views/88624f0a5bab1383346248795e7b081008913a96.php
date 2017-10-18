<?php if($tags->count()): ?>
    <div class="sidebar-tags">
        <div class="sidebar-tags__title">По назначению
        </div>
        <div class="sidebar-tags__tags">
            <?php $__currentLoopData = $tags->take(5)->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="sidebar-tags__tag" href="<?php echo e(route('tags', $tag->sysname)); ?>"><?php echo e($tag->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="sidebar-tags__hidden">
                <?php $__currentLoopData = $tags->take(-1 * ($tags->count() - 5))->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="sidebar-tags__tag" href="<?php echo e(route('tags', $tag->sysname)); ?>"><?php echo e($tag->name); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php if($tags->count() > 5): ?>
            <div class="switch-more-tags js-show-more">
                <span>Показать больше</span>
                <span>Показать меньше</span>
                <i class="sprite sprite-arrow-down-blue2-min"></i>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
