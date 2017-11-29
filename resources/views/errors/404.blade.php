@extends('layouts.main')
@section('content')
  <div class="error-404 container">
    <div class="error-404__corner1"><i class="sprite sprite-corner"></i></div>
    <p class="error-404__txt">Так уж получилось, что из множества страниц нашего сайта Вы оказались как раз на той, которая уже не
      существует...</p>
    <h1 class="error-404__title">404</h1>
    <p class="error-404__txt">Перейдите на главную страницу или воспользуйтесь поиском,который находится
      в шапке сайта.</p>
    <a href="{{ route('index') }}" class="btn btn_blue-border ">
      <span>На главную</span>

    </a>
    <div class="error-404__corner2"><i class="sprite sprite-corner"></i></div>

  </div>
  </div>
@stop
