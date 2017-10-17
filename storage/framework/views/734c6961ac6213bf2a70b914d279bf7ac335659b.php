<!-- exposition tabulator -->
<div class="tabulator-details tabulator-details--expo js-tabulator">
    <div class="tab-wrapper">
        <label class="tab js-tab-active active">
            <span>Описание</span>
        </label>
        <label class="tab js-tab-active js-action-link" data-url="<?php echo e(route('ajax.page', ['sysname' => 'delivery-mini'])); ?>">
            <span>Доставка и оплата</span>
        </label>
        <label class="tab js-tab-active ">
            <span>Характеристики</span>
        </label>
        <label class="tab js-tab-active ">
            <span>Самовывоз</span>
        </label>
    </div>

    <div class="page-wrapper">
        <div class="page js-tab-page active">
            <?php echo $product->text; ?>

        </div>
        <div id="js-delivery-mini" class="page js-tab-page">
            <?php if(isset($delivery)): ?>
                <?php echo $delivery->content; ?>

            <?php endif; ?>
        </div>
        <div class="page js-tab-page">
            <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="page__param-title "><strong><?php echo e($item->name); ?>:</strong><span class="page__param-value"><?php echo e($item->pivot->value); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="page js-tab-page">
            Самовывоз ..........
        </div>
    </div>
</div>