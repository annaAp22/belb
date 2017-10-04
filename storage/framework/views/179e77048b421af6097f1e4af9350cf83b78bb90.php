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
            <li class="active">Способы оплаты</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Оплата
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Список всех способов
                </small>
            </h1>
        </div><!-- /.page-header -->

        <?php echo $__env->make('admin.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="tabbable">


                        <div class="table-header">
                            Список всех способов оплаты

                            <div class="ibox-tools">
                                <a href="<?php echo e(route('admin.payments.create')); ?>" class="btn btn-success btn-xs">
                                    <i class="fa fa-plus"></i>
                                    Добавить способ оплаты
                                </a>
                            </div>

                        </div>
                        <div>
                    <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">

                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody class="ace-thumbnails clearfix">
                                <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr <?php if($item->trashed()): ?>style="background-color: #F6CECE"<?php endif; ?>>
                                        <td>
                                            <a href="<?php echo e(route('admin.deliveries.edit', $item->id)); ?>"><?php echo e($item->name); ?></a>
                                        </td>
                                        <td class="col-sm-1 center"><i class="ace-icon glyphicon <?php if($item->status): ?> glyphicon-ok green <?php else: ?> glyphicon-remove red <?php endif; ?>  bigger-120"></i></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">
                                                <?php if($item->trashed()): ?>
                                                <form method="POST" action='<?php echo e(route('admin.payments.restore', $item->id)); ?>' style="display:inline;">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                                    <button class="btn btn-xs btn-purple action-restore" type="button" style="border-width: 1px;">
                                                        <i class="ace-icon fa fa-undo bigger-120"></i>
                                                    </button>
                                                </form>
                                                <?php else: ?>
                                                <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.payments.edit', $item->id)); ?>">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a>
                                                <form method="POST" action='<?php echo e(route('admin.payments.destroy', $item->id)); ?>' style="display:inline;">
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
                                    <p>Нет способов оплаты</p>
                                <?php endif; ?>
                                </tbody>
                            </table>

                            <div class="row" style="border-bottom:none;">
                                <div class="col-xs-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                                        <?php echo $payments->render(); ?>

                                    </div>
                                </div>
                            </div>


                        </div><!-- /.row -->
                    </div>
                </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>