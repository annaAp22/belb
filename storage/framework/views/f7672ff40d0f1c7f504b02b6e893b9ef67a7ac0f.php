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
                <a href="<?php echo e(route('admin.banners.index')); ?>">Баннеры</a>
            </li>
            <li class="active">Редактирование баннера</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Баннеры
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
                <form class="form-horizontal" role="form" action="<?php echo e(route('admin.banners.update', $banner->id)); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-0"> Тип </label>
                        <div class="col-sm-9">
                            <select name="type" class="col-sm-5" id="form-field-0">
                                <option value="">--Не выбран--</option>
                                <?php $__currentLoopData = \App\Models\Banner::$types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type); ?>" <?php if((old() && old('type')==$type) || (!old() && $banner->type==$name) ): ?> selected="selected"<?php endif; ?>><?php echo e($name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4"> Баннер </label>
                        <div class="col-sm-9">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <?php if($banner->img): ?>
                                        <li class="active">
                                            <a data-toggle="tab" href="#field-img-now" aria-expanded="false">
                                                Текущее
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li <?php if(!$banner->img): ?> class="active" <?php endif; ?>>
                                        <a data-toggle="tab" href="#field-img-new" aria-expanded="true">
                                            Новое
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <?php if($banner->img): ?>
                                        <div id="field-img-now" class="tab-pane fade active in">
                                            <ul class="ace-thumbnails clearfix">
                                                <li>
                                                    <a href="<?php echo e($banner->uploads->img->url()); ?>"  data-rel="colorbox" class="cboxElement">
                                                        <img  src="<?php echo e($banner->uploads->img->preview->url()); ?>">
                                                    </a>
                                                    <div class="tools">
                                                        <a href="<?php echo e(route('admin.image.crop', [
                                                            'img' => $banner->uploads->img->url(),
                                                            'preview' => $banner->uploads->img->preview->url(),
                                                            'width' => $banner->uploads->img->preview->width,
                                                            'height' => $banner->uploads->img->preview->height
                                                        ])); ?>" title="Изменить">
                                                            <i class="ace-icon glyphicon glyphicon-camera"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>


                                        </div>
                                    <?php endif; ?>
                                    <div id="field-img-new" class="tab-pane fade <?php if(!$banner->img): ?> active in <?php endif; ?>">
                                        <input name="img" type="file" class="img-drop" accept="image/*" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-6"> URL </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-6" name="url" placeholder="URL" value="<?php echo e(old('url', $banner->url)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-7"> В новой вкладке </label>
                        <div class="col-sm-9">
                            <label>
                                <input type="hidden" name="blank" value="0">
                                <input name="blank" <?php if((old() && old('blank')) || (empty(old()) && $banner->blank) ): ?> checked="checked" <?php endif; ?>  value="1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox">
                                <span class="lbl"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Активность </label>
                        <div class="col-sm-9">
                            <label>
                                <input type="hidden" name="status" value="0">
                                <input name="status" <?php if((old() && old('status')) || (empty(old()) && $banner->status) ): ?> checked="checked" <?php endif; ?>  value="1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox">
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
                            <a class="btn btn-info" href="<?php echo e(route('admin.banners.index')); ?>">
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