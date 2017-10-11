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
                <a href="<?php echo e(route('admin.categories.index')); ?>">Каталог</a>
            </li>
            <li class="active">Редактирование категории</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Категории товаров
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
                <form class="form-horizontal" role="form" action="<?php echo e(route('admin.categories.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-20"> Категория </label>
                        <div class="col-sm-9">
                            <select name="parent_id" id="form-field-20">
                                <option value="">--Не выбрана--</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>" <?php if((old() && old('parent_id')==$cat->id) || (empty(old()) && $category->parent_id==$cat->id)): ?> selected="selected" <?php endif; ?>><?php echo e($cat->name); ?></option>
                                <?php if($cat->children->count()): ?>)
                                    <?php echo $__env->make('admin.categories.dropdown', ['cats' => $cat->children()->where('id', '!=', $category->id)->orderBy('sort')->get(), 'index' => 1, 'category' => $category], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-0"> Название </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-0" name="name" placeholder="Название" value="<?php echo e(old('name', $category->name)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ЧПУ (URL) </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="sysname" placeholder="sysname" value="<?php echo e(old('sysname', $category->sysname)); ?>" class="col-sm-5">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Если оставить пустым, будет автоматически сгенерированно из Названия" title="">?</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> Ярлыки </label>
                        <div class="col-sm-9">
                            <label class="block">
                                <input name="new" value="1" type="checkbox" <?php if((old() && old('new')) || (!old() && $category->new)): ?>) checked="checked" <?php endif; ?> class="ace input-lg">
                                <span class="lbl bigger-120"> Новинка</span>
                            </label>
                            <label class="block">
                                <input name="act" value="1" type="checkbox" <?php if((old() && old('act')) || (!old() && $category->act)): ?>) checked="checked" <?php endif; ?> class="ace input-lg">
                                <span class="lbl bigger-120"> Акция</span>
                            </label>
                            <label class="block">
                                <input name="hit" value="1" type="checkbox" <?php if((old() && old('hit')) || (!old() && $category->hit)): ?>) checked="checked" <?php endif; ?> class="ace input-lg">
                                <span class="lbl bigger-120"> Хит</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Иконка </label>
                        <div class="col-sm-9">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <?php if($category->icon): ?>
                                    <li class="active">
                                        <a data-toggle="tab" href="#field-icon-now" aria-expanded="false">
                                            Текущая
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <li <?php if(!$category->icon): ?> class="active" <?php endif; ?>>
                                        <a data-toggle="tab" href="#field-icon-new" aria-expanded="true">
                                            Новая
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <?php if($category->icon && $category->uploads): ?>
                                        <div id="field-icon-now" class="tab-pane fade active in">
                                            <img src="<?php echo e($category->uploads->icon->url()); ?>" />
                                        </div>
                                    <?php endif; ?>
                                    <div id="field-icon-new" class="tab-pane fade <?php if(!$category->icon): ?> active in <?php endif; ?>">
                                        <input name="icon" type="file" class="img-drop" accept="image/*" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Изображение </label>
                        <div class="col-sm-9">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <?php if($category->img && $category->uploads): ?>
                                        <li class="active">
                                            <a data-toggle="tab" href="#field-img-now" aria-expanded="false">
                                                Текущее
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li <?php if(!$category->img && $category->uploads): ?> class="active" <?php endif; ?>>
                                        <a data-toggle="tab" href="#field-img-new" aria-expanded="true">
                                            Новое
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <?php if($category->img && $category->uploads): ?>
                                        <div id="field-img-now" class="tab-pane fade active in">
                                            <ul class="ace-thumbnails clearfix">
                                                <li>
                                                    <a href="<?php echo e($category->uploads->img->url()); ?>"  data-rel="colorbox" class="cboxElement">
                                                        <img  src="<?php echo e($category->uploads->img->preview->url()); ?>">
                                                    </a>
                                                    <div class="tools">
                                                        <?php  $image = $category->uploads->img;  ?>
                                                        <a href="<?php echo e(route('admin.image.crop', [
                                                                'img'     => $image->url(),
                                                                'preview' => $image->preview->url(),
                                                                'width'   => $image->preview->width,
                                                                'height'  => $image->preview->height
                                                            ])); ?>" title="Изменить">
                                                            <i class="ace-icon glyphicon glyphicon-camera"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>


                                        </div>
                                    <?php endif; ?>
                                    <div id="field-img-new" class="tab-pane fade <?php if(!$category->img): ?> active in <?php endif; ?>">
                                        <input name="img" type="file" class="img-drop" accept="image/*" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Изображение на главной </label>
                        <div class="col-sm-9">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <?php if($category->img_main && $category->uploads): ?>
                                    <li class="active">
                                        <a data-toggle="tab" href="#field-img_main-now" aria-expanded="false">
                                            Текущая
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                    <li <?php if(!$category->img_main): ?> class="active" <?php endif; ?>>
                                        <a data-toggle="tab" href="#field-img_main-new" aria-expanded="true">
                                            Новая
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <?php if($category->img_main && $category->uploads): ?>
                                    <div id="field-img_main-now" class="tab-pane fade active in">
                                        <img src="<?php echo e($category->uploads->img_main->url()); ?>" />
                                    </div>
                                    <?php endif; ?>
                                    <div id="field-img_main-new" class="tab-pane fade <?php if(!$category->img_main): ?> active in <?php endif; ?>">
                                        <input name="img_main" type="file" class="img-drop" accept="image/*" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Текст анонса</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="5" name="text_preview"><?php echo e(old('text', $category->text_preview)); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="editor2"> Текст </label>
                        <div class="col-sm-9">
                            <textarea class="ck-editor" id="editor2" name="text"><?php echo e(old('text', $category->text)); ?></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-6"> Title </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-6" name="title" placeholder="Title" value="<?php echo e(old('title', $category->title)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-7"> Description </label>
                        <div class="col-sm-9">
                            <textarea id="form-field-7" name="description" placeholder="Description" class="col-sm-12"><?php echo e(old('description', $category->description)); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-8"> Keywords </label>
                        <div class="col-sm-9">
                            <textarea id="form-field-8" name="keywords" placeholder="Keywords" class="col-sm-12"><?php echo e(old('keywords', $category->keywords)); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Активность </label>
                        <div class="col-sm-9">
                            <label>
                                <input type="hidden" name="status" value="0">
                                <input name="status" <?php if((old() && old('status')) || (empty(old()) && $category->status) ): ?> checked="checked" <?php endif; ?>   value="1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox">
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
                            <a class="btn btn-info" href="<?php echo e(route('admin.categories.index')); ?>">
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