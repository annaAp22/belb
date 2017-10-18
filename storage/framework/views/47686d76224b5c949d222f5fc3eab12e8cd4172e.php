<footer>
    <div class="colored-bg__3a69a8">
        <div class="container">
            <div class="navigation-footer">
                <?php echo app('arrilot.widget')->run('CatalogWidget', ['type' => 'footerMenu']); ?>
                
                <?php echo app('arrilot.widget')->run('FooterList', ['page_title' => 'Инфоpмация']); ?>
                <div class="navigation-footer__column navigation-footer__column--message">
                    <p class="navigation-footer__message">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis
                        unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                        eaque ipsa quae ab illo inventore veritatis et quasi
                    </p>
                </div>
                <div class="navigation-footer__column navigation-footer__column--contacts">
                    <div class="navigation-footer__contacts">
                        <div class="navigation-footer__title">Контакты
                        </div>
                        <ul>
                            <li class="navigation-footer__phone">
                                
                                <div class="item"><?php echo $global_settings['phone_number']->value['free']; ?>

                                    
                                </div>
                            </li>
                            <li class="navigation-footer__phone">
                                
                                <div class="item"><?php echo $global_settings['phone_number']->value['msk']; ?>

                                    
                                    
                                </div>
                            </li>
                            
                            
                            
                            
                            
                            

                        </ul>
                    </div>
                    <div class="navigation-footer__social-buttons">
                        <div class="navigation-footer__title navigation-footer__title_mt">Мы в социальных сетях:
                        </div>
                        <div class="navigation-footer__social">
                            <a href="<?php echo $global_settings['social_instagram']->value; ?>" target="_blank"><i
                                        class="sprite sprite-instagram-icon-min"></i></a>
                            <a href="<?php echo $global_settings['social_vk']->value; ?>" target="_blank"><i
                                        class="sprite sprite-vk-icon-min "></i></a>
                            <a href="#"><i class="sprite sprite-twitter-icon-min"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="colored-bg__2a4a74">
        <div class="container footer__info ">
            <div class="footer__requisites"><?php echo $global_settings['site_info']->value; ?>

            </div>
            
            
            
            <div class="footer__copyright"> Москва <?php echo e(date('Y')); ?>. Все права защищены
            </div>
        </div>
    </div>

    
    
</footer>
<div class="map" id="map">
</div>
<div id="tooltip">Этого размера нет в наличии, но Вы можете оформить предзаказ</div>
<?php echo $__env->make('blocks.counters', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>