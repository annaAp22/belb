<div id="quick-order" class="modal-box" style="display: inline-block;">
    <form class="js-form-ajax" action="<?php echo e(route('ajax.order.fast')); ?>" method="POST">
        <div class="form-modal">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
            <input type="hidden" name="size" value="<?php echo e($size); ?>">

            <div class="form-modal_title">БЫСТРЫЙ ЗАКАЗ ТОВАРА</div>
            <div class="form-modal_line">
                <label>Ваше имя: <span class="mod-col-or">*</span></label>
                <input class="js-required-fields input input_text" type="text" name="name" placeholder="Фамилия, имя, отчество *" value="<?php echo e(isset($user->name)?$user->name:''); ?>">
            </div>
            <div class="form-modal_line">
                <label>Ваш email: <span class="mod-col-or">*</span></label>
                <input class="js-required-fields input input_text" type="text" name="email" placeholder="sample@example.com" value="<?php echo e(isset($user->email)?$user->email:''); ?>">
            </div>
            <div class="form-modal_line">
                <label>Ваш телефон: <span class="mod-col-or">*</span></label>
                <input class="phone-input js-required-fields js-phone input input_text" type="text" name="phone" placeholder="+7 (xxx) xxx xx xx * " value="<?php echo e(isset($user->phone)?$user->phone:''); ?>">
                <script type="text/javascript">
                    $('.js-phone').mask("+7 000 000 00 00", {placeholder: "+7 ___ ___ __ __"});
                </script>
            </div>
            <div class="form-modal_line">
                <label class="radio radio_box">
                    <input class="js-required-fields" name="rating" value="1" type="checkbox" checked><span class="fake-input"><span></span></span><span class="label">Я соглашаюсь, на <a target="_blank" href="<?php echo e(route('page', ['sysname' => 'polzovatelskoe-soglashenie'])); ?>">обработку персональных данных</a></span>
                </label>
            </div>
            <div class="form-modal_line">
                <button id="quick-order-finish" class="btn btn_green">ОТПРАВИТЬ</button>
            </div>
        </div>
        <div class="quick-order_col">
            <div class="quick-order_col_thumb">
                <img src="<?php echo e($product->uploads->img->modal->url()); ?>">
            </div>
            <div class="quick-order_col_data">
                <a><?php echo e($product->name); ?></a>

                <div class="quantity">
                    <div class="quantity__handle quantity__handle_minus js-quantity" data-num="-1" > <
                    </div><input class="quantity__input" name="quantity" value="1" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
                    <div class="quantity__handle quantity__handle_plus js-quantity" data-num="1" > >
                    </div>
                </div>

                <div class="quick-order_col_price">
                    <span class="price"><?php echo e(number_format($product->price, 0, '.', ' ')); ?> ₽</span>
                </div>
            </div>
        </div>
    </form>
    <button data-fancybox-close  class="modal-close">&#10006;</button>
</div>