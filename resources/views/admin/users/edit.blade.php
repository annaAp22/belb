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

            <li>
                <a href="{{route('admin.users.index')}}">Пользователи</a>
            </li>
            <li class="active">Редактирование пользователя</li>
        </ul><!-- /.breadcrumb -->


    </div>

    <div class="page-content">

        <div class="page-header">
            <h1>
                Пользователи
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Редактирование
                </small>
            </h1>
        </div><!-- /.page-header -->

        @include('admin.message')

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="{{route('admin.users.update', $user->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input name="_token" type="hidden" value="{{csrf_token()}}">

                   <div class="form-group">
                       <label class="col-sm-3 control-label no-padding-right" for="form-field-20"> Роль </label>
                       <div class="col-sm-9">
                           <select name="group_id" id="form-field-20">
                               <option value="">--Не выбрана--</option>
                               @foreach($groups as $group)
                               <option value="{{$group->id}}" @if((old() && old('group_id')==$group->id) || (!old() && $user->group_id==$group->id))selected="selected"@endif>{{$group->name_rus}}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="col-sm-3 control-label no-padding-right" for="form-field-0"> Имя </label>
                       <div class="col-sm-9">
                           <input type="text" id="form-field-0" name="name" placeholder="Имя" value="{{ old('name', $user->name) }}" class="col-sm-12">
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-mail </label>
                       <div class="col-sm-9">
                           <input type="email" id="form-field-1" name="email" placeholder="E-mail" value="{{ old('email', $user->email) }}" class="col-sm-12">
                       </div>
                   </div>

                   <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"> &nbsp;</label>
                        <div class="col-xs-12 col-sm-4">
                        <div class="widget-box collapsed">
                            <div class="widget-header">
                                <h4 class="widget-title">Изменить пароль</h4>

                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-down"></i>
                                    </a>

                                </div>
                            </div>

                            <div class="widget-body" style="display: none; height: 148px">
                                <div class="widget-main">
                                    <div>
                                        <label for="form-field-8">Пароль</label>

                                        <input type="password" id="form-field-2" name="password" placeholder="Пароль" value="" class="col-sm-12">
                                    </div>

                                    <div>
                                        <label for="form-field-9">Повторите пароль</label>

                                        <input type="password" id="form-field-3" name="password_confirmation" placeholder="Повторите пароль" value="" class="col-sm-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                   <div class="form-group">
                       <label class="col-sm-3 control-label no-padding-right" for="form-field-5"> Активность </label>
                       <div class="col-sm-9">
                           <label>
                               <input type="hidden" name="status" value="0">
                               <input name="status" @if ((old() && old('status')) || (empty(old()) && $user->status) ) checked="checked" @endif   value="1" class="ace ace-switch ace-switch-4 btn-empty" type="checkbox">
                               <span class="lbl"></span>
                           </label>
                       </div>
                   </div>

                   <div class="clearfix form-actions">
                       <div class="col-md-offset-3 col-md-9">
                           <button class="btn btn-success" type="submit">
                               <i class="ace-icon fa fa-check bigger-110"></i>
                               Сохранить
                           </button>
                           &nbsp; &nbsp; &nbsp;
                           <button class="btn" type="reset">
                               <i class="ace-icon fa fa-undo bigger-110"></i>
                               Обновить
                           </button>
                           &nbsp; &nbsp; &nbsp;
                           <a class="btn btn-info" href="{{route('admin.users.index')}}">
                               <i class="ace-icon glyphicon glyphicon-backward bigger-110"></i>
                               Назад
                           </a>

                       </div>
                   </div>

                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@stop
