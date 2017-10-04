    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($cat->id); ?>" <?php if((old() && old('parent_id')==$cat->id) || (!old() && !empty($category) && $category->parent_id==$cat->id) || (isset($filters['id_category']) && $filters['id_category']==$cat->id)): ?>selected="selected"<?php endif; ?>>
    <?php for($i=0;$i<$index;$i++): ?>
    &nbsp;
    <?php endfor; ?>
    <?php echo e($cat->name); ?>

    </option>
    <?php if($cat->children->count()): ?>)
        <?php echo $__env->make('admin.categories.dropdown', ['cats' => $cat->children()->where('id', '!=', !empty($category) ? $category->id : -1)->orderBy('sort')->get(), 'index' => ($index+1), 'category' => !empty($category) ? $category : null], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
