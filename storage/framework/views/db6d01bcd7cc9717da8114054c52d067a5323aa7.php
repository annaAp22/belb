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
            <li class="active">Товары</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Товары
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Список всех товаров
                </small>
            </h1>
        </div><!-- /.page-header -->

        <?php echo $__env->make('admin.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="tabbable">

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active">
                            <a data-toggle="tab" href="<?php echo e(route('admin.products.index')); ?>" aria-expanded="true">
                                Товары
                            </a>
                        </li>
                        <li>
                            <a  href="<?php echo e(route('admin.products.sort.unique-offers')); ?>">
                                Сортировка
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="field-img-now" class="tab-pane fade active in">
                            <div class="table-header">
                                Список всех товаров

                                <div class="ibox-tools">
                                    <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-success btn-xs">
                                        <i class="fa fa-plus"></i>
                                        Добавить товар
                                    </a>
                                </div>

                            </div>
                            <div>
                                <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <div class="row">

                                        <!-- FILTERS -->
                                        <div class="row">
                                            <form method="GET" action="<?php echo e(route('admin.products.index')); ?>">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <div class="dataTables_filter">
                                                            <label>Название:
                                                                <input type="text" name="f[name]" value="<?php echo e(isset($filters['name']) ? $filters['name'] : ''); ?>" class="form-control input-sm">
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-4">
                                                        <div class="dataTables_filter">
                                                            <label>Категория:
                                                                <select name="f[id_category]" id="form-field-20">
                                                                    <option value="">--Не выбрана--</option>
                                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($category->id); ?>" <?php if(isset($filters['id_category']) && $filters['id_category']==$category->id): ?>selected="selected"<?php endif; ?>><?php echo e($category->name); ?></option>
                                                                        <?php if($category->children->count()): ?>)
                                                                        <?php echo $__env->make('admin.products.dropdown', ['cats' => $category->children, 'index' => 1], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-4">
                                                        <div class="dataTables_filter">
                                                            <label>Бренд:
                                                                <select name=f[brand_id]" id="form-field-21">
                                                                    <option value="">--Не выбран--</option>
                                                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($brand->id); ?>" <?php if(isset($filters['brand_id']) && $filters['brand_id']==$brand->id): ?>selected="selected"<?php endif; ?>><?php echo e($brand->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class="dataTables_filter">
                                                            <label>ЧПУ:
                                                                <input type="text" name="f[sysname]" value="<?php echo e(isset($filters['sysname']) ? $filters['sysname'] : ''); ?>" class="form-control input-sm">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if($attributes->count()): ?>
                                                    <?php $__currentLoopData = $attributes->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="row">
                                                            <?php $__currentLoopData = $block; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="col-xs-4">
                                                                    <div class="dataTables_filter">
                                                                        <label><?php echo e($attribute->name); ?>:
                                                                            <?php if($attribute->type == 'list'): ?>
                                                                                <select name="f[attributes][<?php echo e($attribute->id); ?>]"  class="form-control input-sm">
                                                                                    <option value="">--Не выбран--</option>
                                                                                    <?php $__empty_1 = true; $__currentLoopData = $attribute->getLists(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                                        <option value="<?php echo e($value); ?>" <?php if(isset($filters['attributes'][$attribute->id]) && $filters['attributes'][$attribute->id]==$value): ?>selected="selected"<?php endif; ?>><?php echo e($value); ?></option>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            <?php else: ?>
                                                                                <input type="text" name="f[attributes][<?php echo e($attribute->id); ?>]" value="<?php echo e(isset($filters['attributes'][$attribute->id]) ? $filters['attributes'][$attribute->id] : ''); ?>" class="form-control input-sm">
                                                                            <?php endif; ?>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <div class="row">
                                                    <div class="col-xs-2 col-lg-4">
                                                        <div class="dataTables_filter">
                                                            <label>Тэг:
                                                                <select name="f[tag]" class="form-control input-sm" style="width:80%">
                                                                    <option value="">--Не выбрана--</option>
                                                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($tag->id); ?>" <?php if(isset($filters['tag']) &&  $filters['tag']== $tag->id): ?> selected="selected" <?php endif; ?>><?php echo e($tag->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="dataTables_filter">
                                                            <label>Статус
                                                                <select name="f[status]" class="form-control input-sm">
                                                                    <option value="" <?php if(!isset($filters['status'])): ?> selected="selected" <?php endif; ?>>Все</option>
                                                                    <option value="1" <?php if(isset($filters['status']) &&  $filters['status']==1): ?> selected="selected" <?php endif; ?>>Опубликовано</option>
                                                                    <option value="0" <?php if(isset($filters['status']) &&  $filters['status']==='0'): ?> selected="selected" <?php endif; ?>>Черновик</option>

                                                                </select> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3 col-lg-4">
                                                        <div class="dataTables_filter">
                                                            <div class="checkbox">
                                                                <label class="block">
                                                                    <input name="f[deleted]" value="1" type="checkbox" <?php if(isset($filters['deleted'])): ?> checked="checked" <?php endif; ?> class="ace input-lg">
                                                                    <span class="lbl bigger-120"> С удаленными</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <div class="dataTables_filter">
                                                            <label>Сортировка:
                                                                <select name="f[sort]">
                                                                    <option value="">--Не выбрана--</option>
                                                                    <?php $__currentLoopData = $sorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($key); ?>" <?php if(isset($filters['sort']) && $filters['sort'] == $key): ?> selected="selected" <?php endif; ?>><?php echo e($value); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class="dataTables_length">
                                                            <label>На странице
                                                                <select name="f[perpage]" class="form-control input-sm">
                                                                    <option value="10" <?php if(isset($filters['perpage']) &&  $filters['perpage']== 10): ?> selected="selected" <?php endif; ?>>10</option>
                                                                    <option value="25" <?php if(isset($filters['perpage']) &&  $filters['perpage']== 25): ?> selected="selected" <?php endif; ?>>25</option>
                                                                    <option value="50" <?php if(isset($filters['perpage']) &&  $filters['perpage']== 50): ?> selected="selected" <?php endif; ?>>50</option>
                                                                    <option value="100" <?php if(isset($filters['perpage']) &&  $filters['perpage']== 100): ?> selected="selected" <?php endif; ?>>100</option>
                                                                </select> </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class="dataTables_filter">
                                                            <a class="btn  btn-xs" href="<?php echo e(route('admin.products.index')); ?>?refresh=1">
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
                                        <div class="row">
                                            <table id="simple-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Название</th>
                                                    <th>Цена</th>
                                                    <th>Изображение</th>
                                                    <th>Категории</th>
                                                    <th>Бренд</th>
                                                    <th>ЧПУ</th>
                                                    <th>Ярлыки</th>
                                                    <th>Теги</th>
                                                    <th>Статус</th>
                                                    <th></th>
                                                </tr>
                                                </thead>

                                                <tbody class="ace-thumbnails clearfix">
                                                <?php $__empty_2 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                    <tr <?php if($item->trashed()): ?>style="background-color: #F6CECE"<?php endif; ?>>
                                                        <td>
                                                            <a href="<?php echo e(route('admin.products.edit', $item->id)); ?>"><?php echo e($item->name); ?></a>
                                                        </td>
                                                        <td><?php echo e($item->price); ?> руб.</td>
                                                        <td class="col-sm-1 center">
                                                            <?php if($item->uploads): ?>
                                                                <a data-rel="colorbox" href="<?php echo e($item->uploads->img->url()); ?>">
                                                                    <img src="<?php echo e($item->uploads->img->preview->url()); ?>" />
                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php if($item->categories->count()): ?> <?php echo e($item->categories->implode('name', ', ')); ?> <?php endif; ?></td>
                                                        <td><?php if($item->brand): ?> <?php echo e($item->brand->name); ?> <?php endif; ?></td>
                                                        <td><?php echo e($item->sysname); ?></td>
                                                        <td>
                                                            <label class="block">
                                                                <input name="new" data-id="<?php echo e($item->id); ?>" data-url="<?php echo e(route('ajax.product-check')); ?>" value="1" type="checkbox" autocomplete="off" <?php if($item->new): ?> checked="checked" <?php endif; ?> class="ace input-lg js-save-check">
                                                                <span class="lbl"> Новинка</span>
                                                            </label>
                                                            <label class="block">
                                                                <input name="act" data-id="<?php echo e($item->id); ?>" data-url="<?php echo e(route('ajax.product-check')); ?>" value="1" type="checkbox" autocomplete="off" <?php if($item->act): ?> checked="checked" <?php endif; ?> class="ace input-lg js-save-check">
                                                                <span class="lbl"> Акция</span>
                                                            </label>
                                                            <label class="block">
                                                                <input name="hit" data-id="<?php echo e($item->id); ?>" data-url="<?php echo e(route('ajax.product-check')); ?>" value="1" type="checkbox" autocomplete="off" <?php if($item->hit): ?> checked="checked" <?php endif; ?> class="ace input-lg js-save-check">
                                                                <span class="lbl"> Хит</span>
                                                            </label>
                                                            <br>
                                                            
                                                            
                                                            
                                                            <?php if($item->stock): ?>
                                                                <span class="label  label-yellow arrowed-in arrowed-in-right">В наличии</span>
                                                            <?php else: ?>
                                                                <span class="label  label-purple arrowed">Под заказ</span>
                                                            <?php endif; ?>

                                                        </td>
                                                        <td>
                                                            <?php $__currentLoopData = $item->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span class="label label-info arrowed-in-right arrowed"><?php echo e($tag->name); ?></span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td class="col-sm-1 center"><i class="ace-icon glyphicon <?php if($item->status): ?> glyphicon-ok green <?php else: ?> glyphicon-remove red <?php endif; ?>  bigger-120"></i></td>
                                                        <td class="col-sm-1 center">
                                                            <div class="hidden-sm hidden-xs btn-group">
                                                                <?php if($item->trashed()): ?>
                                                                    <form method="POST" action='<?php echo e(route('admin.products.restore', $item->id)); ?>' style="display:inline;">
                                                                        <input type="hidden" name="_method" value="PUT">
                                                                        <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                                                        <button class="btn btn-xs btn-purple action-restore" type="button" style="border-width: 1px;">
                                                                            <i class="ace-icon fa fa-undo bigger-120"></i>
                                                                        </button>
                                                                    </form>

                                                                    <form action="<?php echo e(route('admin.products.remove', ['id' => $item->id])); ?>" method="post" style="float: right" title="Безвозвратно удалить">
                                                                        <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>">
                                                                        <button class="btn btn-xs btn-danger action-delete" type="button" style="border-width: 1px;">
                                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                        </button>
                                                                    </form>
                                                                <?php else: ?>
                                                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.products.edit', $item->id)); ?>">
                                                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                                    </a>
                                                                    <form method="POST" action='<?php echo e(route('admin.products.destroy', $item->id)); ?>' style="display:inline;">
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
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                    <p>Нет товаров</p>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="row" style="border-bottom:none;">
                                            <div class="col-xs-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                                                    <?php echo $products->render(); ?>

                                                </div>
                                            </div>
                                        </div>


                                    </div><!-- /.row -->
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    <div id="saveComplete" class="saved">Сохранено</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>