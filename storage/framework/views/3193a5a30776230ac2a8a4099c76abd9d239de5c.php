<?php $__env->startSection('header'); ?>
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> News
            <a class="btn btn-success pull-right" href="<?php echo e(route('admin.news.create')); ?>"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <div class="page-content">

        <div class="page-header">
            <h1>
                Новости
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Список всех новостей
                </small>
            </h1>
        </div><!-- /.page-header -->

        <?php echo $__env->make('admin.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="table-header">
                    Список всех новостей

                    <div class="ibox-tools">
                        <a href="<?php echo e(route('admin.news.create')); ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-plus"></i>
                            Добавить новость
                        </a>
                    </div>

                </div>
                <?php if($news->count()): ?>
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>ЧПУ (URL)</th>
                            <th>Title</th>
                            <th>Keywords</th>
                            <th>Description</th>
                            <th>Статус</th>
                            <th>Дата создания</th>
                            <th class="text-right"></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($news->name); ?></td>
                                <td><?php echo e($news->sysname); ?></td>
                                <td><?php echo e($news->title); ?></td>
                                <td><?php echo e($news->keywords); ?></td>
                                <td><?php echo e($news->description); ?></td>
                                <td><i class="ace-icon glyphicon <?php echo e($news->status == 1 ? 'glyphicon-ok green' : 'glyphicon-remove red'); ?>"></i> </td>
                                <td><?php echo e($news->created_at); ?></td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="<?php echo e(route('admin.news.edit', $news->id)); ?>"><i class="glyphicon glyphicon-edit"></i> </a>
                                    <form action="<?php echo e(route('admin.news.destroy', $news->id)); ?>" method="POST" style="display: inline;" onsubmit="if(confirm('Удалить новость? Вы уверены?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                <?php else: ?>
                    <p>Нет новостей</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>