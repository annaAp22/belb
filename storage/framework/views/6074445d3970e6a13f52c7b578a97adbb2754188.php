<?php $__env->startSection('main'); ?>
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo e(route('admin.main')); ?>">Главная</a>
            </li>

            <li>
                <a href="<?php echo e(route('admin.products.index')); ?>">Товары</a>
            </li>
            <li class="active">Редактирование товара</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Товары
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Редактирование
                </small>
            </h1>
        </div><!-- /.page-header -->

        <?php echo $__env->make('admin.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-xs-12 ace-thumbnails">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="<?php echo e(route('admin.products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-20"> Категория </label>
                        <div class="col-sm-9">
                            <select multiple="" name="categories[]" class="chosen-select form-control tag-input-style" id="form-field-20" data-placeholder="Выберите категории...">
                                <option value="">--Не выбрана--</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>" <?php if((old() && old('categories') && in_array($cat->id, old('categories'))) || (!old() && !empty($product) && $product->categories->count() && $product->categories->find($cat->id))): ?> selected="selected" <?php endif; ?>>
                                        <?php echo e($cat->name); ?>

                                    </option>
                                    <?php if($cat->children->count()): ?>)
                                        <?php echo $__env->make('admin.products.dropdown', ['cats' => $cat->children, 'index' => 1, 'product' => $product], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-21"> Бренд </label>
                        <div class="col-sm-9">
                            <select name="brand_id" id="form-field-21">
                                <option value="">--Не выбран--</option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($brand->id); ?>" <?php if((old() && old('brand_id')==$brand->id) || (empty(old()) && $product->brand_id==$brand->id)): ?>selected="selected"<?php endif; ?>><?php echo e($brand->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-0"> Название </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-0" name="name" placeholder="Название" value="<?php echo e(old('name', $product->name)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ЧПУ (URL) </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="sysname" placeholder="sysname" value="<?php echo e(old('sysname', $product->sysname)); ?>" class="col-sm-5">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Если оставить пустым, будет автоматически сгенерированно из Названия" title="">?</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-23"> Описание </label>
                        <div class="col-sm-9">
                            <textarea name="descr" class="form-control limited" id="form-field-23" maxlength="200" class="col-sm-12"><?php echo e(old('descr', $product->descr)); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Изображение </label>
                        <div class="col-sm-9">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <?php if($product->img): ?>
                                        <li class="active">
                                            <a data-toggle="tab" href="#field-img-now" aria-expanded="false">
                                                Текущее
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li <?php if(!$product->img): ?> class="active" <?php endif; ?>>
                                        <a data-toggle="tab" href="#field-img-new" aria-expanded="true">
                                            Новое
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <?php if($product->uploads): ?>
                                        <?php  $image = $product->uploads->img;  ?>
                                        <div id="field-img-now" class="tab-pane fade active in">
                                            <ul class="ace-thumbnails clearfix">
                                                <li>
                                                    <a href="<?php echo e($image->url()); ?>"  data-rel="colorbox" class="cboxElement">
                                                        <img  src="<?php echo e($image->detail->url()); ?>">
                                                    </a>
                                                    <div class="tools">
                                                        <a href="<?php echo e(route('admin.image.crop', [
                                                            'img'         => $image->url(),
                                                            'preview'     => $image->big->url(),
                                                            'width'       => $image->big->width,
                                                            'height'      => $image->big->height,
                                                            'previews[0]' => $image->detail->url(),
                                                            'widths[0]'   => $image->detail->width,
                                                            'heights[0]'  => $image->detail->height,
                                                            'previews[1]' => $image->listing->url(),
                                                            'widths[1]'   => $image->listing->width,
                                                            'heights[1]'  => $image->listing->height,
                                                            'previews[2]' => $image->modal->url(),
                                                            'widths[2]'   => $image->modal->width,
                                                            'heights[2]'  => $image->modal->height,
                                                            'previews[3]' => $image->cart->url(),
                                                            'widths[3]'   => $image->cart->width,
                                                            'heights[3]'  => $image->cart->height,
                                                            'previews[4]' => $image->thumb->url(),
                                                            'widths[4]'   => $image->thumb->width,
                                                            'heights[4]'  => $image->thumb->height,
                                                            'previews[5]' => $image->preview->url(),
                                                            'widths[5]'   => $image->preview->width,
                                                            'heights[5]'  => $image->preview->height,
                                                            ])); ?>" title="Изменить">
                                                            <i class="ace-icon glyphicon glyphicon-camera"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>


                                        </div>
                                    <?php endif; ?>
                                    <div id="field-img-new" class="tab-pane fade <?php if(!$product->img): ?> active in <?php endif; ?>">
                                        <input name="img" type="file" class="img-drop" accept="image/*" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Дополнительные изображения </label>
                        <div class="col-sm-9">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <?php if($product->photos()): ?>
                                        <li class="active">
                                            <a data-toggle="tab" href="#field-photos-now" aria-expanded="false">
                                                Текущие
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li <?php if(!$product->photos()): ?> class="active" <?php endif; ?>>
                                        <a data-toggle="tab" href="#field-photos-new" aria-expanded="true">
                                            Добавить
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <?php if($product->photos()): ?>
                                        <div id="field-photos-now" class="tab-pane fade active in">
                                            <ul class="ace-thumbnails photo-container clearfix">
                                                <?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="photo-container-item">
                                                        <a href="<?php echo e($photo->uploads->img->url()); ?>" data-rel="colorbox" title="<?php echo e($photo->name); ?>">
                                                            <img src="<?php echo e($photo->uploads->img->detail->url()); ?>" />
                                                            <div class="tags">
                                                                <span class="label-holder label-delete" style="display: none;">
                                                                    <span class="label label-danger arrowed">На удаление</span>
                                                                </span>
                                                            </div>
                                                        </a>
                                                        <div class="tools tools-top">
                                                            <a href="#" class="photo-action-cancel" style="font-size:18px;display: none;" title="Отменить удаление">
                                                                <i class="ace-icon fa fa-link"></i>
                                                            </a>
                                                            <a href="#" class="photo-action-delete" style="font-size:18px;" title="На удаление">
                                                                <i class="ace-icon fa fa-times red"></i>
                                                            </a>

                                                            <?php  $image = $photo->uploads->img;  ?>
                                                            <a href="<?php echo e(route('admin.image.crop', [
                                                                'img'         => $image->url(),
                                                            'preview'     => $image->big->url(),
                                                            'width'       => $image->big->width,
                                                            'height'      => $image->big->height,
                                                            'previews[0]' => $image->detail->url(),
                                                            'widths[0]'   => $image->detail->width,
                                                            'heights[0]'  => $image->detail->height,
                                                            'previews[1]' => $image->listing->url(),
                                                            'widths[1]'   => $image->listing->width,
                                                            'heights[1]'  => $image->listing->height,
                                                            'previews[2]' => $image->modal->url(),
                                                            'widths[2]'   => $image->modal->width,
                                                            'heights[2]'  => $image->modal->height,
                                                            'previews[3]' => $image->cart->url(),
                                                            'widths[3]'   => $image->cart->width,
                                                            'heights[3]'  => $image->cart->height,
                                                            'previews[4]' => $image->thumb->url(),
                                                            'widths[4]'   => $image->thumb->width,
                                                            'heights[4]'  => $image->thumb->height,
                                                            'previews[5]' => $image->preview->url(),
                                                            'widths[5]'   => $image->preview->width,
                                                            'heights[5]'  => $image->preview->height,
                                                            ])); ?>" title="Изменить">
                                                                <i class="ace-icon glyphicon glyphicon-camera"></i>
                                                            </a>
                                                        </div>
                                                        <input type="hidden" name="p_ids[]" value="<?php echo e($photo->id); ?>">
                                                        <input type="hidden" class="input-delete" name="p_delete[]" value="0">
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>


                                        </div>
                                    <?php endif; ?>

                                    <div id="field-photos-new" class="tab-pane fade <?php if(!$product->photos()): ?> active in <?php endif; ?>" style="height: 100px">
                                        <div class="dynamic-input">
                                            <div class="input-group dynamic-input-item col-sm-5" style="margin-bottom:5px;">
                                                <div class="col-sm-10">
                                                    <input type="file" name="photos[]" class="file-input-img col-sm-12"  accept="image/*" />
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="" class="input-group-addon plus">
                                                        <i class="glyphicon glyphicon-plus bigger-110"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group calculate">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-10"> Цена </label>
                        <div class="col-sm-9" style="padding-left: 12px;">
                            <div class="col-sm-2 input-group" style="float: left;">
                                <input name="price" value="<?php echo e(old('price', $product->price)); ?>" placeholder="Цена" type="text" id="form-field-10" class="input-number form-control" title="Цена на сайте">
                                <span class="input-group-addon">
                                    <i class="fa fa-rub bigger-110"></i>
                                </span>
                            </div>
                            <div class="col-sm-2 input-group" style="float: left; margin-left: 20px;">
                                <input name="discount" value="<?php echo e(old('discount', $product->discount)); ?>" placeholder="Скидка" type="text" class="form-control input-number">
                                <span class="input-group-addon">%</span>
                            </div>
                            <div class="col-sm-2 input-group" style="float: left; margin-left: 20px;">
                                <input name="price_old" value="<?php echo e(old('price_old', $product->price_old)); ?>" placeholder="Цена в МойСклад" type="text" class="input-number form-control" title="Цена в МойСклад">
                                <span class="input-group-addon">
                                    <i class="fa fa-rub bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-11"> Артикул </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-11" name="sku" placeholder="Название" value="<?php echo e(old('sku', $product->sku)); ?>" class="col-sm-2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> Ярлыки </label>
                        <div class="col-sm-9">
                            <label class="block">
                                <input name="new" value="1" type="checkbox" <?php if((old() && old('new')) || (!old() && $product->new)): ?> checked="checked" <?php endif; ?> class="ace input-lg">
                                <span class="lbl bigger-120"> Новинка</span>
                            </label>
                            <label class="block">
                                <input name="act" value="1" type="checkbox" <?php if((old() && old('act')) || (!old() && $product->act)): ?> checked="checked" <?php endif; ?> class="ace input-lg">
                                <span class="lbl bigger-120"> Акция</span>
                            </label>
                            <label class="block">
                                <input name="hit" value="1" type="checkbox" <?php if((old() && old('hit')) || (!old() && $product->hit)): ?> checked="checked" <?php endif; ?> class="ace input-lg">
                                <span class="lbl bigger-120"> Хит</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> Выгрузка в сторонние сервисы </label>
                        <div class="col-sm-9">
                            <label class="block">
                                <input name="ya_market" type="checkbox" class="ace input-lg" value="1" <?php if((old() && old('ya_market')) || (!old() && $product->ya_market)): ?> checked="checked" <?php endif; ?>>
                                <span class="lbl"> Yandex Market</span>
                            </label>
                            <label class="block">
                                <input name="merchant" type="checkbox" class="ace input-lg" value="1" <?php if((old() && old('merchant')) || (!old() && $product->merchant)): ?> checked="checked" <?php endif; ?>>
                                <span class="lbl"> Google Merchant Center</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> Наличие </label>
                        <div class="col-sm-9">
                            <label>
                                <input name="stock" type="radio" class="ace" value="1" <?php if((old() && old('stock') == 1) || (!old() && $product->stock==1)): ?> checked="checked" <?php endif; ?>>
                                <span class="lbl"> В наличии</span>
                            </label>&nbsp;
                            <label>
                                <input name="stock" type="radio" class="ace" value="0" <?php if((old() && old('stock') == 0) || (!old() && $product->stock==0)): ?> checked="checked" <?php endif; ?>>
                                <span class="lbl"> Под заказ</span>
                            </label>
                        </div>
                    </div>

                    <?php if($attributes->count()): ?>
                        <?php echo $__env->make('admin.products.attributes', ['attributes' => $attributes, 'product' => $product], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-12"> Теги </label>
                        <div class="col-sm-9">
                            <select multiple="" name="tags[]" class="chosen-select form-control tag-input-style" id="form-field-12" data-placeholder="Выберите тэг...">
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>" <?php if((old() && old('tags') && in_array($tag->id, old('tags'))) || (!old() && $product->tags->count() && $product->tags->find($tag->id))): ?>selected="selected" <?php endif; ?>><?php echo e($tag->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-12"> Комплекты (Old) </label>
                        <div class="col-sm-9">

                            <select multiple="" name="kits[]" class="chosen-select form-control tag-input-style" id="form-field-12" data-placeholder="Выберите комплект...">
                                <?php $__currentLoopData = $kits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($kit->id); ?>" <?php if((old() && old('kits') && in_array($kit->id, old('kits'))) || (!old() && $product->kits->count() && $product->kits->find($kit->id))): ?>selected="selected" <?php endif; ?>><?php echo e($kit->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-77"> Товары в комплекте (New)</label>
                        <div class="col-sm-9">
                            <div class="widget-box">
                                <div class="widget-header">
                                    <h4 class="smaller">
                                        Товары
                                        <small>Выберите из списка</small>
                                    </h4>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <?php for($i = 0; $i<10; $i++): ?>
                                        <select name="related[<?php echo e($i); ?>]" class="chosen-select chosen-autocomplite form-control" id="form-field-7<?php echo e($i); ?>" data-url="<?php echo e(route('admin.products.search')); ?>" data-placeholder="Начните ввод...">
                                            <option value="">  </option>
                                            <?php if($related && $related->has($i)): ?>
                                                <option value="<?php echo e($related->get($i)->id); ?>" selected><?php echo e($related->get($i)->name); ?></option>
                                            <?php endif; ?>
                                        </select>
                                        <br><br>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="editor2"> Текст </label>
                        <div class="col-sm-9">
                            <textarea class="ck-editor" id="editor2" name="text"><?php echo e(old('text', $product->text)); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="video-url-field"> Видео (URL) </label>
                        <div class="col-sm-9">
                            <input type="text" id="video-url-field" name="video_url" placeholder="Ссылка на видео" value="<?php echo e(old('video_url', $product->video_url)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-6"> Title </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-6" name="title" placeholder="Title" value="<?php echo e(old('title', $product->title)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-7"> Description </label>
                        <div class="col-sm-9">
                            <textarea id="form-field-7" name="description" placeholder="Description" class="col-sm-12"><?php echo e(old('description', $product->description)); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-8"> Keywords </label>
                        <div class="col-sm-9">
                            <textarea id="form-field-8" name="keywords" placeholder="Keywords" class="col-sm-12"><?php echo e(old('keywords', $product->keywords)); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Активность </label>
                        <div class="col-sm-9">
                            <label>
                                <input type="hidden" name="status" value="0">
                                <input name="status" <?php if((old() && old('status')) || (empty(old()) && $product->status) ): ?> checked="checked" <?php endif; ?>   value="1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox">
                                <span class="lbl"></span>
                            </label>
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-success" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Сохранить
                            </button>
                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Обновить
                            </button>
                            &nbsp; &nbsp; &nbsp;
                            <a class="btn btn-info" href="<?php echo e(route('admin.products.index')); ?>">
                                <i class="ace-icon glyphicon glyphicon-backward bigger-110"></i>
                                Назад
                            </a>

                        </div>
                    </div>
                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>