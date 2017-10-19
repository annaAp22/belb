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
                <a href="<?php echo e(route('admin.articles.index')); ?>">Статьи</a>
            </li>
            <li class="active">Добавление статьи</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Статьи
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Добавление
                </small>
            </h1>
        </div><!-- /.page-header -->

        <?php echo $__env->make('admin.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="<?php echo e(route('admin.articles.store')); ?>" method="POST" enctype="multipart/form-data">
                    <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Дата</label>
                        <div class="col-sm-9">
                            <div class="input-group col-sm-4">
                                <input class=" form-control date-picker" name="date" value="<?php echo e(old('date', date('d.m.Y'))); ?>" id="form-field-1" type="text" data-date-format="dd.mm.yyyy" />
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar bigger-110"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-0"> Название </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-0" name="name" placeholder="Название" value="<?php echo e(old('name')); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ЧПУ (URL) </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" name="sysname" placeholder="sysname" value="<?php echo e(old('sysname')); ?>" class="col-sm-5">
                            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="Если оставить пустым, будет автоматически сгенерированно из Названия" title="">?</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4"> Изображение </label>
                        <div class="col-sm-9">
                            <input name="img" type="file" value="<?php echo e(old('img')); ?>" class="img-drop" accept="image/*" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-17"> Описание </label>
                        <div class="col-sm-9">
                            <textarea id="form-field-17" name="descr" placeholder="Описание" class="col-sm-12"><?php echo e(old('descr')); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-12"> Теги </label>
                        <div class="col-sm-9">

                            <select multiple="" name="tags[]" class="chosen-select form-control tag-input-style" id="form-field-12" data-placeholder="Выберите тэг...">
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tag->id); ?>" <?php if(old() && old('tags') && in_array($tag->id, old('tags'))): ?>selected="selected"<?php endif; ?>><?php echo e($tag->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-13"> Категории </label>
                        <div class="col-sm-9">

                            <select multiple="" name="categories[]" class="chosen-select form-control tag-input-style" id="form-field-12" data-placeholder="Выберите категорию...">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php if(old() && old('categories') && in_array($category->id, old('categories'))): ?>selected="selected"<?php endif; ?>><?php echo e($category->name); ?></option>
                                <?php if($category->children->count()): ?>)
                                    <?php echo $__env->make('admin.articles.dropdown', ['cats' => $category->children()->orderBy('sort')->get(), 'index' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Текст </label>
                        <div class="col-sm-9">
                            <textarea class="ck-editor" id="editor2" name="text"><?php echo e(old('text')); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-6"> Title </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-6" name="title" placeholder="Title" value="<?php echo e(old('title')); ?>" class="col-sm-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-7"> Description </label>
                        <div class="col-sm-9">
                            <textarea id="form-field-7" name="description" placeholder="Description" class="col-sm-12"><?php echo e(old('description')); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-8"> Keywords </label>
                        <div class="col-sm-9">
                            <textarea id="form-field-8" name="keywords" placeholder="Keywords" class="col-sm-12"><?php echo e(old('keywords')); ?></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Активность </label>
                        <div class="col-sm-9">
                            <label>
                                <input type="hidden" name="status" value="0">
                                <input name="status" <?php if(old('status') || empty(old())): ?> checked="checked" <?php endif; ?>  value="1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox">
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
                            <a class="btn btn-info" href="<?php echo e(route('admin.articles.index')); ?>">
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