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
            Характеристики ............
        </div>
        <div class="page js-tab-page">
            Самовывоз ..........
        </div>
    </div>
</div>