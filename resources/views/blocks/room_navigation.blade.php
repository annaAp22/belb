@if(Auth::check() && isset($orders_count))
<div class="sidebar_navigation">
    <div class="title">Навигация</div>
    <div class="item {{$active['data']}}">
        <span class="icon sprite sprite-arrow-left-blue-min"></span>
        <a href="{{route('room')}}">МОИ ДАННЫE</a>
    </div>
    <div class="item {{$active['orders']}}">
        <span class="icon sprite sprite-arrow-left-blue-min"></span>
        <a href="{{route('orders-history')}}">Мои заказы</a>
        <div class="cloud">
            <span class="id">{{$orders_count?:0}}</span>
            <div class="corner"></div>
        </div>
    </div>
</div>
@endif