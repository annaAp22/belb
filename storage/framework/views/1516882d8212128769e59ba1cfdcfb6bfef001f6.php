<div class="nav-pages js-pages">
    
    <a class="nav-pages__item nav-pages__item " href="<?php echo e(route('delivery')); ?>"><span>Доставка и оплата</span></a>
    
    
    
    
    <?php if($help->count()): ?>
        
        <div class="nav-pages__item js-toggle-active" data-reset=".js-catalog"><span>Помощь</span><i class="sprite_main sprite_main-icon__arrow_green_down"></i>
            <ul class="nav-pages__dropdown">
                
                <li><button class="btn btn_more"><i class="sprite sprite-arrow-top-min"></i><span>Вернуться назад</span></button></li>
                <li class="mobile-sidebar__title">Помощь</li>

                <?php $__currentLoopData = $help; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('page', ['sysname' => $page->sysname])); ?>"><?php echo e($page->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <a class="nav-pages__item" href="<?php echo e(route('news')); ?>"><span>Акции</span></a>
    <a class="nav-pages__item" href="<?php echo e(route('reviews')); ?>"><span>Отзывы</span></a>
    <a class="nav-pages__item" href="<?php echo e(route('news')); ?>"><span>Наши клиенты</span></a>
    <a class="nav-pages__item" href="<?php echo e(route('page', ['sysname' => 'iz_chego_shem'])); ?>"><span>Услуги</span></a>
    
    <a class="nav-pages__item" href="<?php echo e(route('contacts')); ?>"><span>Контакты</span></a>

    
    <div class="nav-pages__item js-toggle-active" data-reset=".js-catalog-belb">
        <span>Ещё</span><i class="sprite sprite-arrow-down-blue-min"></i>

        <ul class="nav-pages__dropdown">
            
            <li><button class="btn btn_more"><i class="sprite sprite-arrow-top-min"></i><span>Вернуться назад</span></button></li>
            <li class="mobile-sidebar__title">Информация</li>
            <?php echo $__env->make('blocks.info-additional', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
            <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('page', ['sysname' => $page->sysname])); ?>"><?php echo e($page->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
    </div>
</div>