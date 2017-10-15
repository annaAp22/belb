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
                <a href="<?php echo e(route('admin.settings.index')); ?>">Настройки</a>
            </li>
            <li class="active">Редактирование настройки</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Настройки
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
                <form class="form-horizontal" role="form" action="<?php echo e(route('admin.settings.update', $setting->id)); ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Название </label>
                        <div class="col-sm-9">
                            <input type="text" <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('name', new App\Models\Setting())): ?> readonly <?php endif; ?> id="form-field-2" name="var" placeholder="Название" value="<?php echo e(old('route', $setting->var)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Тип </label>
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                    <input name="type" type="radio" class="ace check-vision" value="string" data-name="string-group" <?php if((old() && old('type')=='string') || (empty(old()) && $setting->type=='string') ): ?> checked="checked" <?php endif; ?>>
                                    <span class="lbl"> Строка</span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input name="type" type="radio" class="ace check-vision" value="array" data-name="array-group" <?php if((old() && old('type')=='array') || (empty(old()) && $setting->type=='array') ): ?> checked="checked" <?php endif; ?> >
                                    <span class="lbl"> Массив</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group vision-group string-group" <?php if((old() && old('type')=='array') || (empty(old()) && $setting->type=='array') ): ?>style="display:none;" <?php endif; ?>>
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"> Значение</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-3" name="value" placeholder="Значение" value="<?php echo e(old('value', $setting->value)); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group vision-group array-group" <?php if((old() && old('type')=='string') || (empty(old()) && $setting->type=='string') ): ?>style="display:none;" <?php endif; ?>>
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4"> Значения</label>
                        <div class="col-sm-9">
                            <div class="dynamic-input">
                                <?php if(old('values')): ?>
                                    <?php $__currentLoopData = old('values'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="input-group dynamic-input-item" style="margin-bottom:5px;">
                                            <input class="col-sm-3" class="form-control" type="text" name="keys[]" value="<?php echo e(old('keys')[$key]); ?>" placeholder="Ключ">
                                            <input class="col-sm-9"class="form-control" type="text" name="values[]" value="<?php echo e($value); ?>" placeholder="Значение">
                                            <a href="" class="input-group-addon <?php if($key == 0): ?>plus <?php else: ?> minus <?php endif; ?>">
                                                <i class="glyphicon <?php if($key == 0): ?>glyphicon-plus <?php else: ?> glyphicon-minus <?php endif; ?> bigger-110"></i>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php elseif($setting->values): ?>
                                    <?php $__currentLoopData = $setting->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="input-group dynamic-input-item" style="margin-bottom:5px;">
                                            <input class="col-sm-3" class="form-control" type="text" name="keys[]" value="<?php echo e($key); ?>" placeholder="Имя">
                                            <input class="col-sm-9"class="form-control" type="text" name="values[]" value="<?php echo e($value); ?>" placeholder="Значение">
                                            <a href="" class="input-group-addon <?php if($key == 0): ?>plus <?php else: ?> minus <?php endif; ?>">
                                                <i class="glyphicon <?php if($key == 0): ?>glyphicon-plus <?php else: ?> glyphicon-minus <?php endif; ?> bigger-110"></i>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="input-group dynamic-input-item" style="margin-bottom:5px;">
                                        <input class="col-sm-3" class="form-control" type="text" name="keys[]" placeholder="Ключ">
                                        <input class="col-sm-9"class="form-control" type="text" name="values[]" placeholder="Значение">
                                        <a href="" class="input-group-addon plus">
                                            <i class="glyphicon glyphicon-plus bigger-110"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
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