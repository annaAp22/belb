<?php $__env->startSection('content'); ?>
  <main role="main">
    <!-- Main slider-->
    <?php if($banners->count()): ?>
      <div class="main-slider js-single-banner">
        <div class="main-slider__wrap">
          <div class="main-slider__track">
            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($banner->url == "/bel/sl"): ?>
                <a class="main-slider__item" <?php if($banner->url): ?>href="<?php echo e($banner->url); ?>"<?php endif; ?>>
                  <img class="main-slider__banner main-slider__banner_md-up"
                       src="<?php echo e($banner->uploads->img->lg->url()); ?>" alt="" role="presentation"/>
                  <img class="main-slider__banner main-slider__banner_sm"
                       src="<?php echo e($banner->uploads->img->sm->url()); ?>" alt="" role="presentation"/>
                </a>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        <button class="btn btn_main-slider-control left"><i class="sprite sprite-arrow-l-icon-min"></i>
        </button>
        <button class="btn btn_main-slider-control right"><i class="sprite sprite-arrow-r-icon-min"></i>
        </button>
      </div>
    <?php endif; ?>

  <!-- Made from fiber-->
    
    <div class="container">
      <!-- Main categories-->
      <div class="main-benefits container-in">
      
      
      
      
      
      
      
      <!-- Women category -->
        <?php 
          //$category1 = $categories->where('name', 'Для женщин')->first();
           $category1 = $categories->where('id', '1')->first();
           $category2 = $categories->where('id', '50')->first();
           $category3 = $categories->where('id', '54')->first();
         ?>
        <a class="main-benefits-banner main-benefits-banner_green"
           href="<?php echo e(route('catalog', ['sysname' => $category1->sysname])); ?>">
          
          <img class="main-benefits-banner__image" src="/img/img-benef1-min.jpg" alt="" role="presentation"/>
          <span class="main-benefits-banner__title">Для  уюта</span>
          
          

        </a>
        <a class="main-benefits-banner main-benefits-banner_light-gray"
           href="<?php echo e(route('catalog', ['sysname' => $category2->sysname])); ?>">
          
          <img class="main-benefits-banner__image" src="/img/img-benef2-min.jpg" alt="" role="presentation"/>
          <span class="main-benefits-banner__title">Для здоровья</span>
          
          

        </a>
        <!-- Men category -->
        <a class="main-benefits-banner main-benefits-banner_dark-gray"
           href="<?php echo e(route('catalog', ['sysname' => $category3->sysname])); ?>">
          
          <img class="main-benefits-banner__image" src="/img/img-benef3-min.jpg" alt="" role="presentation"/>
          
          <span class="main-benefits-banner__title">Для красоты</span>
          
          
          
        </a>
      </div>
      
    </div>
    
  <!-- Video and Quality-->
    <div class="container">
      <!-- Video and Quality banner-->
    
    
    
    
    
    
    

    
    
    
    
    <!-- Style and Design-->
      
      
      
      
      
      
      
      
      
      
      
      
    </div>
    <!-- spec offers tabulator -->
    <div class="container">
      <section class="main-offers">
        <div class="main-aside">
          <div class="main-aside__item main-aside__item--article ">
            Статья
          </div>
          <div class="main-aside__item main-aside__item--video">
            Видео
          </div>
          <div class="main-aside__item main-aside__item--reviews">
            Отзывы
          </div>
        </div>
        <div class="main-content">
          <div class="tabulator-offers js-tabulator">
            <div class="tab-wrapper">
              <label class="tab js-tab-active active">
                <span>Хиты</span>
              </label>
              <label class="tab js-tab-active">
                <span>Новинки</span>
              </label>
              <label class="tab js-tab-active">
                <span>Акции</span>
              </label>
            </div>
            <div class="page-wrapper">
              <div class="page js-tab-page active" data-action="widget"
                   data-options='{"config":{"type":"hit"}}' data-url="<?php echo e(route('ajax.widget')); ?>"
                   data-name="ProductsSliderWidget" data-callback="productsSliderInit" data-complete="1">
                <?php echo app('arrilot.widget')->run('ProductsSliderWidget', ['type' => 'hit']); ?>
              </div>
              <div class="page js-tab-page active" data-action="widget"
                   data-options='{"config":{"type":"new"}}' data-url="<?php echo e(route('ajax.widget')); ?>"
                   data-name="ProductsSliderWidget" data-callback="productsSliderInit">
              </div>
              <div class="page js-tab-page active" data-action="widget"
                   data-options='{"config":{"type":"act"}}' data-url="<?php echo e(route('ajax.widget')); ?>"
                   data-name="ProductsSliderWidget" data-callback="productsSliderInit">
              </div>
            </div>
          </div>
          <div class="main-catalog">
            <h3>Каталог товаров</h3>
            <p class="main-catalog__sub-title">Более 5 000 товаров</p>
            <ul class="main-catalog__list">
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <li class="main-catalog__item">
                  <a class="main-catalog__lnk" href="<?php echo e(route('catalog', $category->sysname)); ?>">
                    <img src="<?php echo e($category->uploads->img_main->original->url()); ?>"/>
                    <div class="main-catalog__lnk-top">
                      <div class="main-catalog__top main-catalog__top--1" >Более<br> <span><?php echo e($category->getProductsCountAttribute()); ?></span><br> товаров</div>
                      <div class="main-catalog__top main-catalog__top--2" >Цены от<br> <span><?php echo e($category->getMinPriceAttribute()); ?></span></div>
                    </div>
                    <h4><?php echo e($category->name); ?></h4>
                    <p class="main-catalog__text"><?php echo e($category->text_preview); ?></p>
                  </a>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
      </section>
    </div>
    <div class="colored-bg colored-bg_edf5fc ">
      <div class="container main-callback">
        <div class="main-callback__image">
          
        </div>
        <div class="main-callback__form">
          <form class="form-main-callb js-form-ajax " id="main-callback" action="<?php echo e(route('ajax.callback')); ?>"
                method="POST">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="is_multiple" value="1">

            <div class="form-main-callb_title">Есть вопросы о товаре?</div>
            <p class="form-main-callb_text">Оставьте заявку на обратный звонок,и наш специалист свяжется с Вами!</p>
            <div class="form-main-callb_line form-main-callb_line--hidden">
              <label>Ваше имя: <span class="mod-col-or">*</span></label>
              <input class="js-required-fields input input_text" type="text" name="name" placeholder="Имя" value="x">
            </div>
            <div class="form-main-callb_line">
              <input class="js-required-fields js-phone input " type="text" name="phone"
                     placeholder="Введите ваш номер...+7 (xxx) xxx xx xx ">
              
              
              
              <button class="form-main-callb__btn " type="submit">
                <i class="sprite sprite-phone-icon-white-min normal"></i>
              </button>
            </div>
            <div class="form-main-callb_line form-main-callb_line--hidden">
              <label class="radio radio_box">
                <input class="js-required-fields" name="rating" value="1" type="checkbox"><span
                    class="fake-input"><span></span></span><span class="label">Я соглашаюсь, на <a target="_blank"
                                                                                                   href="<?php echo e(route('page', ['sysname' => 'polzovatelskoe-soglashenie'])); ?>">обработку персональных данных</a></span>
              </label>
            </div>
          </form>
        </div>
      </div>
    </div>
    <section class="main-trust container">
      <h3>Почему нам можно доверять?</h3>
      <div class="main-trust__wrap">
        <ul class="main-trust__items">
          <li class="main-trust__item">
            <h4 class="main-trust__title"><i class="sprite sprite-checked-symbol-min"></i><span>Качество</span></h4>
            <p class="main-trust__text">Немецкое товары проверенные временем .</p>
          </li>
          <li class="main-trust__item">
            <h4 class="main-trust__title"><i class="sprite sprite-checked-symbol-min"></i><span>Гарантия</span></h4>
            <p class="main-trust__text">Гарантия на нашу продукцию от одного года.</p>
          </li>
          <li class="main-trust__item">
            <h4 class="main-trust__title"><i class="sprite sprite-checked-symbol-min"></i><span>Материалы</span></h4>
            <p class="main-trust__text">Наша продукция выполняется из надежных качественных немецких материалов.</p>
          </li>
        </ul>
        <div class="main-trust__img">
          <img src="/img/germany-min.jpg" alt="Германия"/>
        </div>
      </div>
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    

    <?php echo app('arrilot.widget')->run('adviceWidget'); ?>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>