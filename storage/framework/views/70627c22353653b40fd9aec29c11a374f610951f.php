<!-- details tabulator -->
<div class="tabulator-details js-tabulator">
    <div class="tab-wrapper">
        <label class="tab js-tab-active active">
            <span>Отзывы -<strong> <?php echo e($comments->total()); ?></strong></span>
        </label>
        <label class="tab js-tab-active js-vk-comments-widget">
            <span>Комментарии ВК</span>
        </label>
    </div>
    <div class="page-wrapper">
        <div class="page js-tab-page active" data-complete="1">
            <!-- Reviews-->
            <div id="product-reviews" class="product-reviews container-in active js-reviews" data-count="<?php echo e($comments->count()); ?>">
                <!-- Reviews items-->
                <?php if($comments->count()): ?>
                    <div class="js-container-comments wrapper">
                        <?php echo $__env->make('catalog.products.comments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                <?php else: ?>
                <!-- Empty reviews-->
                    <div class="reviews-empty"><i class="sprite_main sprite_main-empty-reviews-arrow-gray"></i>
                        <div class="reviews-empty__title">Оставьте первый отзыв
                        </div>
                        <div class="reviews-empty__text">Будьте первым, кто поделится своим мнением о товаре. Ваш отзыв внесет ценный вклад в развитие сервиса
                        </div>
                        <div class="product-rating">
                            <div class="icon-fade product-rating__star active"><i class="sprite sprite-star-min normal"></i><i class="sprite sprite-star-blue-big-min active"></i>
                            </div>
                            <div class="icon-fade product-rating__star active"><i class="sprite sprite-star-min normal"></i><i class="sprite sprite-star-blue-big-min active"></i>
                            </div>
                            <div class="icon-fade product-rating__star active"><i class="sprite sprite-star-min normal"></i><i class="sprite sprite-star-blue-big-min active"></i>
                            </div>
                            <div class="icon-fade product-rating__star active"><i class="sprite sprite-star-min normal"></i><i class="sprite sprite-star-blue-big-min active"></i>
                            </div>
                            <div class="icon-fade product-rating__star"><i class="sprite sprite-star-min normal"></i><i class="sprite sprite-star-blue-big-min active"></i>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <!-- Reviews navigation-->
                <?php if($comments->lastPage() > $comments->currentPage()): ?>
                    <div class="product-reviews-navigation js-pagination-comments">
                        <button class="btn btn_more js-action-link"
                                data-url="<?php echo e(route('ajax.product.comments')); ?>"
                                data-product_id="<?php echo e($product->id); ?>"
                                data-page="<?php echo e($comments->currentPage() + 1); ?>">
                            <span class="text">Показать больше</span>
                            <span class="count js-items-count">(<?php echo e(min($comments->total() - ($comments->currentPage() * $comments->perPage()), $comments->perPage())); ?>)</span><i class="sprite sprite-arrow-down-blue2-min"></i>
                        </button>
                        <button class="btn btn_show-all js-action-link"
                                data-url="<?php echo e(route('ajax.product.comments')); ?>"
                                data-product_id="<?php echo e($product->id); ?>"
                                data-page="1">
                            <span>Показать все</span><i class="sprite sprite-arrow-down-blue2-min"></i>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="page js-tab-page">
            <div class="product-vk-comments js-reviews" id="js-vk_comments">
            </div>
        </div>
    </div>
</div>
<form class="product-review-form js-form-ajax" method="post" action="<?php echo e(route('ajax.product.comment', ['id' => $product->id ])); ?>">
    <div class="product-review-form__title">Оставить свой отзыв
    </div>
    <!-- Form body-->
    <div class="product-review-form__body js-comment-success">

        <!-- Form fields-->
        <div class="product-review-form__label">Представьтесь
        </div><input class="input input_text js-required-fields" type="text" name="name" placeholder="Ваше имя"/>
        <div class="product-review-form__label product-review-form__label_mt">Оцените товар по 5-ти бальной шкале
        </div>
        
            
                
                
                
                
            
            
                
                
                
                
            
            
                
                
                
                
            
            
                
                
                
                
            
            
                
                
                
                
            
        
        <div class="rating-inputs">
            <input type="radio" name="rating" id="input-rating-1" value="1" >
            <input type="radio" name="rating" id="input-rating-2" value="2">
            <input type="radio" name="rating" id="input-rating-3" value="3">
            <input type="radio" name="rating" id="input-rating-4" value="4">
            <input type="radio" name="rating" id="input-rating-5" value="5" checked >
            <label class="radio-star sprite sprite-star-blue-big-min" for="input-rating-1"></label>
            <label class="radio-star sprite sprite-star-blue-big-min" for="input-rating-2"></label>
            <label class="radio-star sprite sprite-star-blue-big-min" for="input-rating-3"></label>
            <label class="radio-star sprite sprite-star-blue-big-min" for="input-rating-4"></label>
            <label class="radio-star sprite sprite-star-blue-big-min" for="input-rating-5"></label>
        </div>
        <div class="product-review-form__label product-review-form__label_mt">Текст Вашего отзыва</div>
        <textarea class="textarea textarea_text" name="text" placeholder="Несколько слов о товаре"></textarea>
        <button class="btn btn_blue-border-4">ОТПРАВИТЬ</button>
    </div>

    <?php echo e(csrf_field()); ?>

</form>
