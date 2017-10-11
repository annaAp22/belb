<?php 
    $attribute_ids = old('attributes') ?:
        !isset($product) ? null :
        ($product->attributes->count() ?
            $product->attributes->pluck('pivot.value', 'id')->all() :
            null);
 ?>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right"> Атрибуты </label>
    <div class="col-sm-9">
        <div class="dynamic-input">
            <?php  $i = 0;  ?>
            <?php if($attribute_ids): ?>
                <?php $__currentLoopData = $attribute_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr_id => $attr_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('admin.attributes.dynamic', ['attributes' => $attributes, 'first' => $i == 0, 'id' => $attr_id, 'value' => $attr_value], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php  $i++;  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <?php echo $__env->make('admin.attributes.dynamic', ['attributes' => $attributes, 'first' => $i == 0, 'id' => null, 'value' => null], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>