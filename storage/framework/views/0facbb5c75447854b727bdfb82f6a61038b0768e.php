<?php if( isset($category) || isset($tag) ): ?>
  <form
      action="<?php echo e(route(Route::current()->getName(), ['sysname' => isset($category->sysname)?$category->sysname:$tag->sysname])); ?>"
      method="post" class="sidebar-filter" id="js-filters">
    <?php echo e(csrf_field()); ?>

    
    <input type="hidden" name="filter" value="1">
    
    <input type="hidden" name="page" value="1">
    <?php 
      if(!isset($pageCount)) $pageCount = 1;
     ?>
    <input type="hidden" name="pageCount" value="<?php echo e($pageCount); ?>">
    <?php if($category): ?>
      <input type="hidden" name="category_id" value="<?php echo e($category->id); ?>">
    <?php elseif($tag): ?>
      <input type="hidden" name="tag_id" value="<?php echo e($tag->id); ?>">
    <?php endif; ?>
    <input type="hidden" name="sort" value="<?php echo e($sort); ?>">

    <div class="sidebar-filter__title">Фильтры подбора:
    </div>
    <!-- Price filter-->
    <?php if($maxPrice > $minPrice): ?>
      <div class="sidebar-filter__subtitle">Цена товара:
      </div>
      <div class="range-slider sidebar-filter__item">
        <div class="range-slider__label price"><span><?php echo e(number_format($minPrice, 0, '.', ' ')); ?> ₽</span><span><?php echo e(number_format($maxPrice, 0, '.', ' ')); ?>

            ₽</span>
        </div>
        <div class="range-slider__slider" id="js-range-slider" data-range="[<?php echo e($minPrice); ?>,<?php echo e($maxPrice); ?>]"
             data-start="[<?php echo e($startPrice); ?>,<?php echo e($endPrice); ?>]">
        </div>
        <div class="range-slider__label text"><span>От</span><span>До</span>
        </div>
        <div class="input" data-currency="₽">
          <input class="input__text js-slider-input" type="text" name="price_from" id="js-price-min"/>
          <input class="input__text js-slider-input" type="text" name="price_to" id="js-price-max"/>
        </div>
      </div>
    <?php endif; ?>
    <?php if(isset($filters) && $filtersCount = $filters->count()): ?>
      <?php if($material = $filters->where('name', 'Материал')->first()): ?>
      <!-- material filter-->
        <div class="sidebar-filter__subtitle"><?php echo e($material->name); ?>:</div>
        <div class="checkbox-filter sidebar-filter__item">
          <?php $__currentLoopData = $material->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <label>
              <input type="checkbox" name="attribute[<?php echo e($material->id); ?>][]" value="<?php echo e($value); ?>"/>
              <div class="checkbox-filter__checkbox">
              </div>
              <span><?php echo e($value); ?></span>
            </label>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>
      <?php if($sizes = $filters->where('name', 'Размеры')->first()): ?>
      <!-- Size filter-->
        <div class="sidebar-filter__subtitle"><?php echo e($sizes->name); ?>:</div>
        <div class="size-filter sidebar-filter__item square-filter js-square-check-filter">
          <?php $__currentLoopData = $sizes->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                class="size-filter__size js-square <?php if(isset($attributes[$sizes->id])and(in_array('"'.$size.'"', $attributes[$sizes->id]))): ?> active <?php endif; ?>">
              <span><?php echo e($size); ?></span>
              <input type="hidden" name="attribute[<?php echo e($sizes->id); ?>][]" value='"<?php echo e($size); ?>"'
                     <?php if(!isset($attributes[$sizes->id])or(!in_array('"'.$size.'"', $attributes[$sizes->id]))): ?> disabled="disabled" <?php endif; ?>/>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>
      <?php if($colors = $filters->where('name', 'Основной цвет')->first()): ?>
      <!-- Primary color filter -->
        <div class="sidebar-filter__subtitle"><?php echo e($colors->name); ?>:</div>
        <div class="color-filter square-filter js-square-check-filter">
          <?php $__currentLoopData = $colors->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
                class="color-filter__color<?php echo e($color == "#ffffff" ? " color-filter__color_white" : ""); ?> js-square <?php if(isset($attributes[$colors->id])and(in_array($color, $attributes[$colors->id]))): ?> active <?php endif; ?>"
                style="background-color: <?php echo e($color); ?>;" title="<?php echo e($colors->getColorAttribute($color)); ?>">
              <input type="hidden" name="attribute[<?php echo e($colors->id); ?>][]" value="<?php echo e($color); ?>"
                     <?php if(!isset($attributes[$colors->id])or(!in_array($color, $attributes[$colors->id]))): ?> disabled="disabled" <?php endif; ?>/>
              <i class="sprite_main sprite_main-listing__filter_color-checked"></i>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>

    <!-- Hidden additional filters-->
      
      
      

      


    <!-- All other filters -->
      
      <?php $__currentLoopData = $filters->whereNotIn('name',['Размеры', 'Основной цвет', 'Материал']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="sidebar-filter__hidden">
          <div class="sidebar-filter__subtitle collapsed js-toggle-active"><?php echo e($filter->name); ?>:<i
                class="sprite sprite-arrow-down-blue2-min"></i></div>
          <?php if( $filter['name'] === 'Цвет вставок'): ?>
            <div class="color-filter square-filter sidebar-filter__item js-square-check-filter js-hidden">
              <?php $__currentLoopData = $filter->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="color-filter__color<?php echo e($color == "#ffffff" ? " color-filter__color_white" : ""); ?> js-square <?php if(isset($attributes[$colors->id])and(in_array($color, $attributes[$colors->id]))): ?> active <?php endif; ?>"
                    style="background-color: <?php echo e($color); ?>;" title="<?php echo e($colors->getColorAttribute($color)); ?>">
                  <input type="hidden" name="attribute[<?php echo e($colors->id); ?>][]" value="<?php echo e($color); ?>" disabled="disabled"/>
                  <i class="sprite_main sprite_main-listing__filter_color-checked"></i>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php else: ?>
            <div class="checkbox-filter sidebar-filter__item">
              <?php $__currentLoopData = $filter->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label>
                  <input type="checkbox" name="attribute[<?php echo e($filter->id); ?>][]" value="<?php echo e($value); ?>"/>
                  <div class="checkbox-filter__checkbox">
                  </div>
                  <span><?php echo e($value); ?></span>
                </label>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endif; ?>
        </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__env->startSection('more_filters'); ?>
      <div class="switch-additional-filters js-show-more"><i
            class="sprite_main sprite_main-listing__filter_arrow_down"></i><span>Показать больше</span><span>Скрыть фильтры</span><i
            class="sprite_main sprite_main-listing__filter_arrow_down"></i></div>
    <?php $__env->stopSection(); ?>

    <?php endif; ?>

  <!-- Apply filter-->
    <button class="btn btn_blue btn_w100p js-close-filters" name="apply">Применить
    </button>
    <button class="btn btn_reset btn_w100p js-filters-reset" name="reset"><i
          class="sprite sprite-cross-red-min"></i><span>Сбросить фильтры</span>
    </button>
    <?php echo $__env->yieldContent('more_filters'); ?>
  </form>
<?php endif; ?>