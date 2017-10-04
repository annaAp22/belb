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
            <li class="active">Кэш</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Кэш очищен.
            </h1>
        </div><!-- /.page-header -->
    </div><!-- /.page-content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>