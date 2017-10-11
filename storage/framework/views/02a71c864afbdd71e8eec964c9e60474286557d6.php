<select name="" class="col-sm-9 select-attribute" style="height: 34px"  placeholder="Атрибут">
    <option value="-1">--Не выбран--</option>
    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($attribute->id); ?>"
                <?php if($attribute->id == $selected_id): ?>selected <?php endif; ?>
                data-type="<?php echo e($attribute->getOriginal('type')); ?>"
                data-unit="<?php echo e($attribute->unit); ?>"
                data-list="<?php echo e($attribute->list); ?>"><?php echo e($attribute->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
