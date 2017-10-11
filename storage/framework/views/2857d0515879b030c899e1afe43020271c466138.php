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
            <li class="active">Мета-тэги</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Метатэги
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Список всех мета-тегов
                </small>
            </h1>
        </div><!-- /.page-header -->

        <?php echo $__env->make('admin.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-xs-12">

                <div class="table-header">
                    Список всех мета-тегов
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add', new App\Models\Metatag())): ?>
                    <div class="ibox-tools">
                        <a href="<?php echo e(route('admin.metatags.create')); ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-plus"></i>
                            Добавить мета-теги
                        </a>
                    </div>
                <?php endif; ?>
                </div>
                <div>
                    <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">

                            <!-- FILTERS -->
                            <div class="row">
                                <form method="GET" action="<?php echo e(route('admin.metatags.index')); ?>">
                                    <div class="col-xs-3">
                                        <div class="dataTables_length">
                                            <label>На страниц
                                                <select name="f[perpage]" class="form-control input-sm">
                                                    <option value="10" <?php if(isset($filters['perpage']) &&  $filters['perpage']== 10): ?> selected="selected" <?php endif; ?>>10</option>
                                                    <option value="25" <?php if(isset($filters['perpage']) &&  $filters['perpage']== 25): ?> selected="selected" <?php endif; ?>>25</option>
                                                    <option value="50" <?php if(isset($filters['perpage']) &&  $filters['perpage']== 50): ?> selected="selected" <?php endif; ?>>50</option>
                                                    <option value="100" <?php if(isset($filters['perpage']) &&  $filters['perpage']== 100): ?> selected="selected" <?php endif; ?>>100</option>
                                                </select> </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="dataTables_filter">
                                            <label>URL:
                                                <input type="text" name="f[url]" value="<?php echo e(isset($filters['url']) ? $filters['url'] : ''); ?>" class="form-control input-sm">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="dataTables_filter">
                                            <label>Название:
                                                <input type="text" name="f[name]" value="<?php echo e(isset($filters['name']) ? $filters['name'] : ''); ?>" class="form-control input-sm">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="dataTables_filter">
                                            <a class="btn  btn-xs" href="<?php echo e(route('admin.metatags.index')); ?>?refresh=1">
                                                Сбросить
                                                <i class="ace-icon glyphicon glyphicon-refresh  align-top bigger-125 icon-on-right"></i>
                                            </a>

                                            <button class="btn btn-info btn-xs" type="submit">
                                                Фильтровать
                                                <i class="ace-icon glyphicon glyphicon-search  align-top bigger-125 icon-on-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>URL</th>
                                    <th class="col-sm-1">Title</th>
                                    <th class="col-sm-1">Description</th>
                                    <th class="col-sm-1">Keywords</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $metatags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metatag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('admin.metatags.edit', $metatag->id)); ?>"><?php echo e($metatag->name); ?></a>
                                        </td>
                                        <td><?php echo e($metatag->url); ?></td>
                                        <td class="col-sm-1 center"><i class="ace-icon glyphicon <?php if($metatag->title): ?> glyphicon-ok green <?php else: ?> glyphicon-remove red <?php endif; ?>  bigger-120"></i></td>
                                        <td class="col-sm-1 center"><i class="ace-icon glyphicon <?php if($metatag->description): ?> glyphicon-ok green <?php else: ?> glyphicon-remove red <?php endif; ?> bigger-120"></i></td>
                                        <td class="col-sm-1 center"><i class="ace-icon glyphicon <?php if($metatag->keywords): ?> glyphicon-ok green <?php else: ?> glyphicon-remove red <?php endif; ?> bigger-120"></i></td>

                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">

                                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.metatags.edit', $metatag->id)); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', new App\Models\Metatag())): ?>
                                                <form method="POST" action='<?php echo e(route('admin.metatags.destroy', $metatag->id)); ?>' style="display:inline;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                                    <button class="btn btn-xs btn-danger action-delete" type="button" style="border-width: 1px;">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p>Нет метатегов</p>
                                <?php endif; ?>
                                </tbody>
                            </table>

                            <div class="row" style="border-bottom:none;">
                                <div class="col-xs-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                                        <?php echo $metatags->render(); ?>

                                    </div>
                                </div>
                            </div>


                        </div><!-- /.row -->
                    </div>
                </div>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>