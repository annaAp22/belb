<?php if($paginator->hasPages()): ?>
    <div class="page-navigation">
         
        <?php if($paginator->currentPage() == 1): ?>
            <span class="page-navigation_prev"></span>
        <?php else: ?>
            <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="page-navigation_prev" rel="prev"></a>
        <?php endif; ?>

        
        <?php for($p = 1; $p <= $paginator->lastPage(); $p++): ?>
            <?php if($p == $paginator->currentPage()): ?>
                <span class="page-navigation_num"><?php echo e($p); ?></span>
            <?php else: ?>
                <a href="<?php echo e($paginator->url($p)); ?>" class="page-navigation_num"><?php echo e($p); ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="page-navigation_next" rel="next"></a>
        <?php else: ?>
            <span class="page-navigation_next"></span>
        <?php endif; ?>
    </div>
<?php endif; ?>
