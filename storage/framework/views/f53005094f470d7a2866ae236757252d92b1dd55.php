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
            <li class="active">Теги</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Теги
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Список всех тегов
                </small>
            </h1>
        </div><!-- /.page-header -->

        <?php echo $__env->make('admin.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-xs-12">

                <div class="table-header">
                    Список всех тегов
                    <div class="ibox-tools">
                        <a href="<?php echo e(route('admin.tags.create')); ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-plus"></i>
                            Добавить тег
                        </a>
                    </div>
                </div>
                <div>
                    <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">

                            <!-- FILTERS -->
                            <div class="row">
                                <form method="GET" action="<?php echo e(route('admin.tags.index')); ?>">
                                    <div class="row">
                                        <div class="col-xs-2">
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
                                                <label>Название:
                                                    <input type="text" name="f[var]" value="<?php echo e(isset($filters['var']) ? $filters['var'] : ''); ?>" class="form-control input-sm">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="dataTables_filter">
                                                <label>ЧПУ:
                                                    <input type="text" name="f[sysname]" value="<?php echo e(isset($filters['sysname']) ? $filters['sysname'] : ''); ?>" class="form-control input-sm">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="dataTables_length">
                                                <label>Статус
                                                    <select name="f[status]" class="form-control input-sm">
                                                        <option value="" <?php if(!isset($filters['status'])): ?> selected="selected" <?php endif; ?>>Все</option>
                                                        <option value="1" <?php if(isset($filters['status']) &&  $filters['status']==1): ?> selected="selected" <?php endif; ?>>Опубликовано</option>
                                                        <option value="0" <?php if(isset($filters['status']) &&  $filters['status']==='0'): ?> selected="selected" <?php endif; ?>>Черновик</option>

                                                    </select> </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="dataTables_length">
                                                <div class="checkbox">
                                                    <label class="block">
                                                        <input name="f[deleted]" value="1" type="checkbox" <?php if(isset($filters['deleted'])): ?> checked="checked" <?php endif; ?> class="ace input-lg">
                                                        <span class="lbl bigger-120"> С удаленными</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="dataTables_filter">
                                                <a class="btn  btn-xs" href="<?php echo e(route('admin.tags.index')); ?>?refresh=1">
                                                    Сбросить
                                                    <i class="ace-icon glyphicon glyphicon-refresh  align-top bigger-125 icon-on-right"></i>
                                                </a>

                                                <button class="btn btn-info btn-xs" type="submit">
                                                    Фильтровать
                                                    <i class="ace-icon glyphicon glyphicon-search  align-top bigger-125 icon-on-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>ЧПУ</th>
                                    <th>Частота просмотров</th>
                                    <th>Товаров</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr <?php if($item->trashed()): ?>style="background-color: #F6CECE"<?php endif; ?>>
                                        <td>
                                            <a href="<?php echo e(route('admin.tags.edit', $item->id)); ?>"><?php echo e($item->name); ?></a>
                                        </td>
                                        <td><?php echo e($item->sysname); ?></td>
                                        <td><?php echo e($item->views); ?></td>
                                        <td>
                                            <?php if($item->products->count()): ?>
                                                <span class="badge badge-warning bigger-120"><?php echo e($item->products->count()); ?></span>
                                                <a class="btn btn-minier btn-info" href="<?php echo e(route('admin.products.index')); ?>?f[tag]=<?php echo e($item->id); ?>" title="Товары с тэгом">
                                                    <i class="ace-icon fa fa-pencil"></i>
                                                </a>
                                                <a class="btn btn-minier btn-pink" href="<?php echo e(route('admin.products.tag.sort', $item->id)); ?>" title="Сортировка внутри тэга">
                                                    <i class="ace-icon glyphicon glyphicon-list-alt"></i>
                                                </a>
                                            <?php endif; ?>
                                            <a class="btn btn-minier" href="<?php echo e(route('admin.tags.products', $item->id)); ?>" title="Привязка товаров">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </td>
                                        <td class="col-sm-1 center"><i class="ace-icon glyphicon <?php if($item->status): ?> glyphicon-ok green <?php else: ?> glyphicon-remove red <?php endif; ?>  bigger-120"></i></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">
                                                <?php if($item->trashed()): ?>
                                                    <form method="POST" action='<?php echo e(route('admin.tags.restore', $item->id)); ?>' style="display:inline;">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                                        <button class="btn btn-xs btn-purple action-restore" type="button" style="border-width: 1px;">
                                                            <i class="ace-icon fa fa-undo bigger-120"></i>
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.tags.edit', $item->id)); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a>
                                                <form method="POST" action='<?php echo e(route('admin.tags.destroy', $item->id)); ?>' style="display:inline;">
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
                                    <p>Нет тегов</p>
                                <?php endif; ?>
                                </tbody>
                            </table>

                            <div class="row" style="border-bottom:none;">
                                <div class="col-xs-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                                        <?php echo $tags->render(); ?>

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