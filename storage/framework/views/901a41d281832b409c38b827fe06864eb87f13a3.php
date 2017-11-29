<!-- Ribbons-->
<span class="ribbons">
    <?php if($product->hit): ?>
        <span class="ribbons__ribbon ribbons__ribbon_hit">Хит!</span>
    <?php endif; ?>
    <?php if($product->new): ?>
        <span class="ribbons__ribbon ribbons__ribbon_new">New</span>
    <?php endif; ?>
    <?php if($product->discount): ?>
        <span class="ribbons__ribbon ribbons__ribbon_sale">-<?php echo e($product->discount); ?>%</span>
    <?php endif; ?>
</span>