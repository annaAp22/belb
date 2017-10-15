<?php $__env->startSection('header'); ?>
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Reviews
            <a class="btn btn-success pull-right" href="<?php echo e(route('admin.reviews.create')); ?>"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <div class="page-content">

        <div class="page-header">
            <h1>
                Отзывы о магазине
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Список всех отзывов
                </small>
            </h1>
        </div><!-- /.page-header -->

        <?php echo $__env->make('admin.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="table-header">
                    Список всех отзывов

                    <div class="ibox-tools">
                        <a href="<?php echo e(route('admin.reviews.create')); ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-plus"></i>
                            Добавить отзыв
                        </a>
                    </div>

                </div>
                <?php if($reviews->count()): ?>
                    <table class="table table-condensed table-striped">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>E-Mail</th>
                            <th>Содержание</th>
                            <th>Статус</th>
                            <th>Дата создания</th>
                            <th class="text-right"></th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($review->name); ?></td>
                                <td><?php echo e($review->email); ?></td>
                                <td><?php echo e($review->message); ?></td>
                                <td><i class="ace-icon glyphicon <?php echo e($review->status == 1 ? 'glyphicon-ok green' : 'glyphicon-remove red'); ?>"></i> </td>
                                <td><?php echo e($review->created_at); ?></td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-warning" href="<?php echo e(route('admin.reviews.edit', $review->id)); ?>"><i class="glyphicon glyphicon-edit"></i> </a>
                                    <form action="<?php echo e(route('admin.reviews.destroy', $review->id)); ?>" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo $reviews->render(); ?>

                <?php else: ?>
                    <p>Нет отзывов о магазине</p>
                <?php endif; ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>