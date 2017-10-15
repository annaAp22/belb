<?php $__env->startSection('css'); ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Reviews / Edit #<?php echo e($review->id); ?></h1>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<div class="page-content">
    <div class="page-header">
        <h1>
            Отзывы о магазине
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Редактирование
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-md-12">

            <form action="<?php echo e(route('admin.reviews.update', $review->id)); ?>" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                <div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
                    <label for="name-field">Имя (Ф.И.О.)</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="<?php echo e(is_null(old("name")) ? $review->name : old('name')); ?>" required/>
                    <?php if($errors->has("name")): ?>
                        <span class="help-block"><?php echo e($errors->first("name")); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
                    <label for="email-field">E-Mail</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="<?php echo e(is_null(old("email")) ? $review->email : old('email')); ?>"/>
                    <?php if($errors->has("email")): ?>
                        <span class="help-block"><?php echo e($errors->first("email")); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php if($errors->has('message')): ?> has-error <?php endif; ?>">
                    <label for="message-field">Текст отзыва</label>
                    <textarea class="form-control" id="message-field" rows="3" name="message" required ><?php echo e(is_null(old("message")) ? $review->message : old('message')); ?></textarea>
                    <?php if($errors->has("message")): ?>
                        <span class="help-block"><?php echo e($errors->first("message")); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php if($errors->has('status')): ?> has-error <?php endif; ?>">
                    <label for="status-field">Статус</label>
                    <select name="status" id="status-field" value="<?php echo e(is_null(old('status')) ? $review->status : old('status')); ?>">
                        <option value="0">Черновик</option>
                        <option value="1">Опубликован</option>
                    </select>
                    <?php if($errors->has("status")): ?>
                        <span class="help-block"><?php echo e($errors->first("status")); ?></span>
                    <?php endif; ?>
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a class="btn btn-link pull-right" href="<?php echo e(route('admin.reviews.index')); ?>"><i class="glyphicon glyphicon-backward"></i>  Назад</a>
                </div>
            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>