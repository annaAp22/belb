<header>
    
    <div class="container">
        <div class="header">
            <!-- Schedule -->
            

            <!-- Hamburger -->
            <div class="header__hamburger">
                <div class="hamburger js-toggle-sidebar" data-target=".js-nav-visible">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <!-- Site logo -->
            <a class="header__logo" href="/">
                
                <img src="/img/belberg_logo.svg" alt="belberg_logo"/>
            </a>

            
            <div class="header__city">
                <span class="js-toggle-active-target" data-target=".js-geo-city-widget">
                    <i class="sprite sprite-locate-places-min"></i>
                      <span><?php echo e($user_city); ?></span>
                     <i class="sprite sprite-arrow-dwn-min"></i>
                </span>

                
                <?php echo app('arrilot.widget')->run('SelectCity'); ?>
            </div>

            <!-- Search Start -->
            <form id="search" class="header__search form-search" method="POST" action="<?php echo e(route('search')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="search" name="text" placeholder="Поиск по товарам..."/>
                <button class="icon-fade " type="submit">
                    <i class="sprite sprite-search-icon-min normal"></i>
                    <i class="sprite sprite-search-icon-min active"></i>
                </button>
            </form>
            <!-- Search End -->

            
            <div class="header__phones">
                
                    
                        
                    
                    
                        
                    
                    
                
                <div class="header__item"><i class="sprite sprite-phone-icon-min"></i><?php echo $global_settings['phone_number']->value['msk']; ?><br/>
                    <span>с <?php echo e($global_settings['schedule']->value['start_workday']); ?> до <?php echo e($global_settings['schedule']->value['end_workday']); ?> без выходных</span>
                </div>
                <div class="header__item"><i class="sprite sprite-phone-icon-min"></i><?php echo $global_settings['phone_number']->value['free']; ?><br/><span>Бесплатно по России</span>
                </div>
            </div>


            <div class="header__basket">
                
                <a href="<?php echo e(route('bookmarks')); ?>" class="js-hover-notice">


                    <div class="count count_wishlist <?php if($countD = count($defer)): ?><?php echo e('active'); ?><?php endif; ?>">
                        <span class="js-wishlist-quantity"><?php echo e($countD); ?></span>
                    </div>


                    
                    <span class="icon-fade header-wishlist">
                        <i class="sprite sprite-favorite-icon-min normal"></i>
                        <i class="sprite sprite-favorite-icon-min active"></i>
                    </span>

                    
                    <span class="popup-notice popup-notice_wishlist-header">
                        <span class="popup-notice__triangle">▼</span>
                        <span class="popup-notice__text">Отложенное</span>
                    </span>
                </a>

                
                <a href="<?php echo e(route('seen')); ?>" class="js-hover-notice">

                    <?php if($countS = count($seen)): ?>
                    <div class="count count_seen">
                        <span class="js-seen-quantity"><?php echo e($countS); ?></span>
                    </div>
                    <?php endif; ?>

                    
                    <span class="icon-fade seen">
                        <i class="sprite sprite-icon-eye-min normal"></i>
                        <i class="sprite sprite-icon-eye-min active"></i>
                    </span>

                    
                    <span class="popup-notice popup-notice_wishlist-header">
                        <span class="popup-notice__triangle">▼</span>
                        <span class="popup-notice__text">Просмотренное</span>
                    </span>
                </a>

                
                <?php echo app('arrilot.widget')->run('HeaderBasket'); ?>

            </div>
            <div class="hr-1">
                <div></div>
            </div>
            <?php echo app('arrilot.widget')->run('CatalogWidget', ['type' => 'headerNavigation']); ?>
            <!-- Site login-->
            
                
                
                
                    
                        
                        
                    
                    
                        
                        
                        
                    
                
            
            <div class="vl"></div>
        </div>
    </div>

    <?php echo app('arrilot.widget')->run('CatalogWidget'); ?>
</header>