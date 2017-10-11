    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($cat->id); ?>" <?php if((old() && old('categories') && in_array($cat->id, old('categories'))) || (!old() && !empty($product) && $product->categories->count() && $product->categories->find($cat->id)) || (isset($filters['id_category']) && $filters['id_category']==$cat->id)): ?>selected="selected"<?php endif; ?>>
            <?php for($i=0;$i<$index;$i++): ?> &nbsp; <?php endfor; ?>
            <?php echo e($cat->name); ?>

        </option>
        <?php if($cat->children->count()): ?>
            <?php echo $__env->make('admin.products.dropdown', ['cats' => $cat->children, 'index' => ($index+1), 'product' => !empty($product) ? $product : null], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
