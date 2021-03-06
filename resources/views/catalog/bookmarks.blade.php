@extends('layouts.main')

@section('breadcrumbs')
    {!!  Breadcrumbs::render('bookmarks') !!}
@stop

@section('content')
    <main>
        <div class="container">
            {{-- SideBar --}}
            @include('content.aside')

            <section class="content">
                <div class="container-in">
                    <!-- Header -->
                    <div class="header-listing">
                        <h1>Отложенные товары</h1>
                        <div class="goods-count">
                            <span>Товаров в категории</span>
                            <i class="sprite sprite-outline-min">{{ $products->count() }}</i>
                        </div>
                    </div>

                    <!-- Goods listing-->
                    <div class="goods-listing js-view" id="js-goods">
                        @if($products->count())
                            @include('catalog.products.list')
                        @else
                            Нет товаров
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </main>
@stop