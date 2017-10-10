<div class="header__navigation">
  <div class="nav-catalog">
    <div class="nav-catalog__btn nav-pages__item js-toggle-active js-catalog-belb " data-reset=".js-pages" ><i
          class="sprite sprite-burg-min nav-pages__icon-burg "></i><span class="mobile-sidebar__title">Каталог товаров</span><i
          class="sprite sprite-arrow-down-blue-min"></i>
      <ul class="nav-pages__dropdown">
        <li><button class="btn btn_more"><i class="sprite_main sprite_main-icon__arrow_to_top"></i><span>Вернуться назад</span></button></li>
        <li class="mobile-sidebar__title">Каталог</li>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li>
            <a href="<?php echo e(route('catalog', $category->sysname)); ?>"><?php echo e($category->name); ?></a>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </ul>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
  </div>
  
  <?php echo app('arrilot.widget')->run('PageNavigation'); ?>

</div>
