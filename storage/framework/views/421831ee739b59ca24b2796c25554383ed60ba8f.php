<div class="dynamic-input-item dynamic-attributes" style="margin-bottom:5px;">
    
    <div class="input-group col-sm-4" style="float:left;">
        <a href="" class="input-group-addon <?php if($first): ?>plus <?php else: ?> minus <?php endif; ?>">
            <i class="glyphicon <?php if($first): ?>glyphicon-plus <?php else: ?> glyphicon-minus <?php endif; ?> bigger-110"></i>
        </a>
        <?php echo $__env->make('admin.attributes.select', ['attributes' => $attributes, 'selected_id' => $id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    
    <div class="input-group col-sm-3 field field-value input-string" style="float:left; display:none;">
        <input class="col-sm-9" type="text" data-dynamic name="attributes[<?php echo e($id ?: -1); ?>]" value="<?php echo e($value ?: ''); ?>" placeholder="Значение">
    </div>

    
    <div class="input-group col-sm-3 field field-value input-integer" style="float:left; display:none;">
        <a class="input-group-addon">шт.</a>
        <input class="col-sm-9" type="text" data-dynamic name="attributes[<?php echo e($id ?: -1); ?>]" value="<?php echo e($value ?: ''); ?>" placeholder="Значение">
    </div>

    
    <div class="input-group col-sm-3 field field-values input-list" style="float:left; display:none;">
        <select name="attributes[<?php echo e($id ?: -1); ?>]" data-dynamic class="col-sm-9" style="height: 34px" data-val="<?php echo e($value ?: ''); ?>" value="<?php echo e($value ?: ''); ?>">
            <option value=""></option>
        </select>
    </div>

    
    <div class="input-group col-sm-3 field field-values input-color" style="float:left; display:none;">
        <input  name="attributes[<?php echo e($id ?: -1); ?>]" data-dynamic type="text" value="<?php echo e($value ?: ''); ?>" />
    </div>

    
    <div class="input-group col-sm-6 field field-values input-checklist" style="float:left; display:none;">
        <input  name="attributes[<?php echo e($id ?: -1); ?>]" data-dynamic type="hidden" value="<?php echo e($value ?: ''); ?>" data-val="<?php echo e($value ?: ''); ?>" />
    </div>

    <div style="clear:both"></div>
</div>
