    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($cat->id); ?>" <?php if((old() && old('categories') && in_array($cat->id, old('categories'))) || (!old() && !empty($article) && $article->categories->count() && $article->categories->find($cat->id)) || (isset($filters['id_category']) && $filters['id_category']==$cat->id)): ?>selected="selected"<?php endif; ?>>
    <?php for($i=0;$i<$index;$i++): ?>
    &nbsp;
    <?php endfor; ?>
    <?php echo e($cat->name); ?>

    </option>
    <?php if($cat->children->count()): ?>)
        <?php echo $__env->make('admin.articles.dropdown', ['cats' => $cat->children()->orderBy('sort')->get(), 'index' => ($index+1), 'article' => !empty($article) ? $article : null], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
