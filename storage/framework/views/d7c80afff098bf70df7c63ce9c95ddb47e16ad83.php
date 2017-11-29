<!-- Stars rating-->
<?php  $comments = $product->comments->first();  ?>
<div class="product-rating">
    <span class="product-rating__count sprite sprite-comment-bubble-min"><?php echo e(($comments) ? $comments->count : 0); ?></span>
    <?php for($i=1;$i<=5;$i++): ?>
        <div class="icon-fade product-rating__star">
            <?php if($comments && $i <= $comments->avg): ?>
                <i class="sprite sprite-star-blue-min"></i>
            <?php else: ?>
                <i class="sprite sprite-star-white-min"></i>
            <?php endif; ?>
        </div>
    <?php endfor; ?>
</div>