

    
    
    
        
            
                
                    
                
            
            
                
                    
                
            
        
    



<div class="navigation-footer__column navigation-footer__column_dropdown">
  <div class="navigation-footer__title js-toggle-active">Каталог товаров<i
        class="sprite sprite-arrow-down-min"></i>
  </div>
  <ul>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li>
        <a href="<?php echo e(route('catalog', $category->sysname)); ?>"><?php echo e($category->name); ?></a>
      </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>