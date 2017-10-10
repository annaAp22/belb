<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo Breadcrumbs::render('look_book'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <div class="container">
           

                <div class="container-in">
                    <div class="header-listing">
                        <h1>Подобрать Look</h1>
                    </div>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($book->looks->count()): ?>
                            <div class="look-book">
                                <div class="look-book__title">
                                    <span><?php echo e(strstr($book->name, ' ', true)); ?></span> <span>\</span> <span><?php echo e(strstr($book->name, ' ')); ?></span>
                                </div>
                                <?php echo $__env->make('looks.carousel', ['looks' => $book->looks], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>