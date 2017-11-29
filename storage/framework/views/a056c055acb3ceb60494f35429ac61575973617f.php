<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="product-review review">
        <div class="product-review__info">
            <i class="sprite sprite-person-min"></i>
            <div>
                <div class="product-review__name"><?php echo e($comment->name); ?></div>
                <div class="product-review__date"><?php echo e($comment->created_at->format('Y.m.d')); ?></div>
                <div class="product-rating">
                    <?php for($i = 0; $i < $comment->rating; $i++): ?>
                        <div class="icon-fade product-rating__star active"><i class="sprite sprite-star-min normal"></i><i class="sprite sprite-star-blue-min active"></i>
                        </div>
                    <?php endfor; ?>
                    <?php for(;$i < 5; $i++): ?>
                        <div class="icon-fade product-rating__star"><i class="sprite sprite-star-min normal"></i><i class="sprite sprite-star-blue-min active"></i>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <div class="product-review__text"><?php echo e($comment->text); ?></div>
        <?php if($comment->answer): ?>
            <div class="product-review__text product-review__text_answer">
                <div class="product-review__answer-title">Ответ магазина:</div>
                <?php echo e($comment->answer); ?>

            </div>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>