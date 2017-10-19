<?php if($category): ?>
<div class="sidebar-catalog">
    <div class="sidebar-catalog__title"><?php echo e($category->name); ?>:
    </div>
  <?php if($config['type'] !== 'belb'): ?>
  <ul class="sidebar-catalog__level-1">
      <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="list-item js-listing-catalog-<?php echo e($key); ?><?php echo e(( ($config['current']->id == $category->id && $loop->first) || $config['current']->parent_id == $subcategory->id || $config['current']->id == $subcategory->id)  ? ' active' : ''); ?>">
              <a href="<?php echo e(route('catalog', ['sysname' => $subcategory->sysname])); ?>">
                  <span><?php echo e($subcategory->name); ?></span>
                  <i class="sprite_main sprite_main-icon__arrow_green_down js-toggle-active-target" data-target=".js-listing-catalog-<?php echo e($key); ?>"></i>
              </a>
              <ul class="list-item__level-2">
                  <?php $__currentLoopData = $subcategory->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($child->id != $config['current']->id): ?>
                          <li><a href="<?php echo e(route('catalog', ['sysname' => $child->sysname])); ?>"><span><?php echo e($child->name); ?></span></a></li>
                      <?php else: ?>
                          <li>
                              <i class="sprite_main sprite_main-icon__arrow_yellow_to_right"></i>
                              <a class="active" href="<?php echo e(route('catalog', ['sysname' => $child->sysname])); ?>">
                                  <span><?php echo e($child->name); ?></span>
                              </a>
                          </li>
                      <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  <?php endif; ?>
</div>
<?php endif; ?>