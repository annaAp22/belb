@extends('admin.layout')
@section('main')

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{route('admin.main')}}">Главная</a>
            </li>
            <li class="active">Атрибуты</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Атрибуты
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Список всех атрибутов
                </small>
            </h1>
        </div><!-- /.page-header -->

        @include('admin.message')

        <div class="row">
            <div class="col-xs-12">
                <div class="tabbable">
                        <div class="table-header">
                            Список всех атрибутов

                            <div class="ibox-tools">
                                <a href="{{route('admin.attributes.create')}}" class="btn btn-success btn-xs">
                                    <i class="fa fa-plus"></i>
                                    Добавить атрибут
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
                                    <th>Тип</th>
                                    <th>В фильтрах</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody class="ace-thumbnails clearfix">
                                @forelse($attributes as $item)
                                    <tr @if($item->trashed())style="background-color: #F6CECE"@endif>
                                        <td>
                                            <a href="{{route('admin.attributes.edit', $item->id)}}">{{$item->name}}</a>
                                        </td>
                                        <td>{{$item->type}}</td>
                                        <td class="col-sm-1 center"><i class="ace-icon glyphicon @if($item->is_filter) glyphicon-ok green @else glyphicon-remove red @endif  bigger-120"></i></td>
                                        <td class="col-sm-1 center"><i class="ace-icon glyphicon @if($item->status) glyphicon-ok green @else glyphicon-remove red @endif  bigger-120"></i></td>
                                        <td>
                                            <div class="hidden-sm hidden-xs btn-group">
                                                @if($item->trashed())
                                                <form method="POST" action='{{route('admin.attributes.restore', $item->id)}}' style="display:inline;">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <input name="_token" type="hidden" value="{{csrf_token()}}">
                                                    <button class="btn btn-xs btn-purple action-restore" type="button" style="border-width: 1px;">
                                                        <i class="ace-icon fa fa-undo bigger-120"></i>
                                                    </button>
                                                </form>
                                                @else
                                                <a class="btn btn-xs btn-info" href="{{route('admin.attributes.edit', $item->id)}}">
                                                    <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                </a>
                                                <form method="POST" action='{{route('admin.attributes.destroy', $item->id)}}' style="display:inline;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input name="_token" type="hidden" value="{{csrf_token()}}">
                                                    <button class="btn btn-xs btn-danger action-delete" type="button" style="border-width: 1px;">
                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Нет атрибутов</p>
                                @endforelse
                                </tbody>
                            </table>

                            <div class="row" style="border-bottom:none;">
                                <div class="col-xs-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                                        {!! $attributes->render() !!}
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


@stop