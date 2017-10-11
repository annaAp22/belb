<?php $__env->startSection('breadcrumbs'); ?>
<?php echo Breadcrumbs::render('page', $page); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="container">
    <?php echo $__env->make('blocks.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="content">
        <div class="container-in contacts">

            <!-- Header -->
            <div class="header-listing">
                <h1>Контакты</h1>
                <!-- Back to shopping link-->
                
                        
                            
                            
                            
                        
                
            </div>

            <!-- Phones -->
            <div class="contacts__phones">
                <div class="page-text__title_h3 page-text__title_700">По всем вопросам звоните:</div>
                <div class="contacts__text contacts__text_phones">
                    Телефон магазина: <br><strong><?php echo $global_settings['phone_number']->value['msk']; ?></strong>
                    <a target="_blank" href="https://mssg.me/fit2u" rel="nofollow">
                        <img src="<?php echo e(asset('assets/uploads/contacts-phones-1-min.jpg')); ?>" alt="">
                    </a>
                </div>
                <div class="contacts__text contacts__text_phones">
                    Бесплатный номер: <br><strong><?php echo $global_settings['phone_number']->value['free']; ?></strong>
                    <img src="<?php echo e(asset('assets/uploads/contacts-phones-2-min.jpg')); ?>" alt="">
                </div>
                <div class="contacts__text contacts__text_phones">
                    Наш email: <br><strong><?php echo $global_settings['email_support']->value; ?></strong>
                </div>
            </div>
            <!-- Time -->
            <div class="contacts__time">
                <div class="page-text__title_h3 page-text__title_700">Рабочее время:</div>
                <div class="contacts__text">
                    Ежедневно с <?php echo e($global_settings['schedule']->value['start_workday']); ?> до <?php echo e($global_settings['schedule']->value['end_workday']); ?>.
                    <br>
                    Без выходных.
                </div>
            </div>
            <!-- Address -->
            <div class="contacts__address">
                <div class="page-text__title_h3 page-text__title_700">Адрес:</div>
                <div class="contacts__text">
                    <?php echo $page->content; ?>

                </div>
            </div>
            <?php echo $__env->make('buttons.callback', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Payment types -->
            <div class="contacts__note-1 contacts__text">
                <strong>* Для посещения магазина оформлять заказ не обязательно! Весь товар с сайта представлен
                    в магазине.</strong>  В магазине можно расплатиться наличными и картой:
                <br>
                <img class="contacts__mt page-text__image" src="<?php echo e(asset('assets/uploads/contacts-img-payment-min.jpg')); ?>" alt="payment methods">
            </div>
            <!-- Documents needed -->
            <div class="contacts__note-2 contacts__text">
                *Для прохода при себе необходимо иметь удостоверение личности. Если все таки ничего не взяли, звоните нам, мы встретим.
            </div>
            <!-- By foot -->
            <div class="contacts__get-by">
                <div>
                    <img class="contacts__mt page-text__image" src="<?php echo e(asset('assets/uploads/contacts-img-footprint-min.jpg')); ?>" alt="">
                </div>
                <div>
                    <div class="page-text__title_h3 page-text__title_700">Как пройти к магазину пешком от метро Автозаводская:</div>
                    <div class="contacts__text">
                        Последний вагон из центра, из стеклянных дверей налево. Выйдя на улицу, идете прямо до улицы Ленинская слобода. Переходите дорогу и поворачивайте налево. Через 250 метров справа будет вход в БЦ"ОМЕГА 2" корпус А
                        <br><br>
                        Обратите особое внимание, что в этом здании 4 корпуса одного бизнес центра! Вам нужен Вход напротив БЦ "ОМЕГА ПЛАЗА"
                        - <a href="#scheme">СМОТРИТЕ СХЕМУ!!!</a>
                    </div>
                </div>
            </div>
            <!-- By car -->
            <div class="contacts__get-by">
                <div>
                    <img class="contacts__mt page-text__image" src="<?php echo e(asset('assets/uploads/contacts-img-car-min.jpg')); ?>" alt="">
                </div>
                <div>
                    <div class="page-text__title_h3 page-text__title_700">Если Вы на автомобиле:</div>
                    <div class="contacts__text">
                        Второй вариант, это подземная парковка под мебельным центром ROOMER. Бесплатно 1 час. Выходите из паркинга в мебельный центр, затем на улицу и входите в Бизнес-центр. Далее на лифте на 5й этаж и первый офис на право наш.
                    </div>
                </div>
            </div>
            <!-- How to get scheme -->
            <?php echo $__env->make('blocks.contacts-scheme', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Distributors -->
            <div class="contacts__get-by contacts__distributors">
                <div>
                    <img class="page-text__image" src="<?php echo e(asset('assets/uploads/contacts-img-point-min.jpg')); ?>" alt="">
                </div>
                <div class="contacts__text">
                    <a href="<?php echo e(route('page', ['sysname' => 'agencies'])); ?>">Спортивные лосины и яркие топы марки Profit в других городах - список представителей</a>
                </div>
            </div>
            <!-- Store inside photos -->
            <?php echo $__env->make('blocks.contacts-gallery', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Map -->
            <div class="contacts__map">
                <img src="<?php echo e(asset('assets/uploads/contacts-img-map-min.jpg')); ?>" alt="">
            </div>
        </div>
    </section>

    <section class="content-full-width">
        <?php echo app('arrilot.widget')->run('SubscribeWidget'); ?>
    </section>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>