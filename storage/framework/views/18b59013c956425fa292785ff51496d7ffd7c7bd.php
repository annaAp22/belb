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
                <a href="<?php echo e(route('admin.metatags.index')); ?>">Мета-тэги</a>
            </li>
            <li class="active">Редактирование мета-тэгов</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Мета-тэги
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Редактирование
                </small>
            </h1>
        </div><!-- /.page-header -->

        <?php echo $__env->make('admin.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="<?php echo e(route('admin.metatags.update', $metatag->id)); ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-0"> Название страницы </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-0" name="name" placeholder="Название" value="<?php echo e(old('name', $metatag->name)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> URL-шаблон </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="url" placeholder="Url" value="<?php echo e(old('url', $metatag->url)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Маршрут </label>
                        <div class="col-sm-9">
                            <input type="text" <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('route', new App\Models\Metatag())): ?> readonly <?php endif; ?> id="form-field-2" name="route" placeholder="Маршрут" value="<?php echo e(old('route', $metatag->route)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Title </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-2" name="title" placeholder="Title" value="<?php echo e(old('title', $metatag->title)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4"> Description </label>
                        <div class="col-sm-9">
                            <textarea  id="form-field-4" name="description" class="col-sm-12" placeholder="Description"><?php echo e(old('description', $metatag->description)); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Keywords </label>
                        <div class="col-sm-9">
                            <textarea  id="form-field-5" name="keywords" class="col-sm-12" placeholder="Keywords"><?php echo e(old('keywords', $metatag->keywords)); ?></textarea>
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Сохранить
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Отменить
                            </button>
                        </div>
                    </div>

                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>