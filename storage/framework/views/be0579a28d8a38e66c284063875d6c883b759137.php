<div class="geo-city js-geo-city-widget">
    <div class="geo-city__top">
        <div class="geo-city__title">Выбор Вашего города:</div>

        <form class="form-search geo-city__search js-prevent" method="POST">
            <?php echo e(csrf_field()); ?>

            <button class="icon-fade" type="submit">
                <i class="sprite_main sprite_main-header__search_active normal"></i>
                <i class="sprite sprite-search-icon-min active"></i>
            </button>
            <input class="js-geo-city-search" type="search" name="text" placeholder="Найти город..."/>
        </form>

        <div class="modal-close geo-city__close js-toggle-active-target" data-target=".js-geo-city-widget">✖</div>

    </div>

    <div class="geo-city__bottom js-geo-desktop">

        <div class="description-scroll geo-city__select js-geo-level-2">
            <div class="geo-city__select__title">Регион:</div>
            <div class="description-scroll__body geo-city__select__body">
                <?php if( $active = $regions->where('region', $config['region'])->first()): ?>
                    <div class="geo-city__select__item">
                        <span class="active js-toggle-active js-geo-region js-action-link" data-reset=".js-geo-region" data-url="<?php echo e(route('ajax.geo_cities')); ?>" data-region="<?php echo e($active->region); ?>"><?php echo e($active->region); ?></span>
                    </div>
                <?php endif; ?>
                <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( !$active or $active->region != $region->region ): ?>
                        <div class="geo-city__select__item">
                            <span class="js-toggle-active js-geo-region js-action-link" data-reset=".js-geo-region" data-url="<?php echo e(route('ajax.geo_cities')); ?>" data-region="<?php echo e($region->region); ?>"><?php echo e($region->region); ?></span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="description-scroll geo-city__select js-geo-level-2">
            <div class="geo-city__select__title">Город:</div>
            <div class="description-scroll__body geo-city__select__body js-geo-city__body">
                <?php if( $active = $cities->where('city', $config['city'])->first()): ?>
                    <div class="geo-city__select__item">
                        <span class="active"><?php echo e($active->city); ?></span>
                    </div>
                <?php endif; ?>
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( !$active or $active->city != $city->city ): ?>
                        <div class="geo-city__select__item">
                            <span class="js-geo-city" data-city="<?php echo e($city->city); ?>"><?php echo e($city->city); ?></span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</div>