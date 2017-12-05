<div class="mobile-sidebar js-nav-visible" id="sidebar-navigation">
  <div class="mobile-sidebar__catalog js-catalog-mobile"></div>

  <div class="mobile-sidebar__title js-pages-mobile">Навигация
  </div>

  {{-- City choose --}}
  <div class="mobile-sidebar__title">Ваш город</div>
    <div class="sidebar-geo js-toggle-active">
        <div class="sidebar-geo__city">
            <i class="sprite sprite-locate-places-min"></i>
            <span>{{ $user_city }}</span>
            <i class="sprite sprite-arrow-dwn-min"></i>
        </div>

        <div class="mobile-sidebar__level-2 sidebar-geo__level-2 js-geo-mobile">
            {{--<button class="btn btn_more"><i class="sprite sprite-arrow-top-min"></i><span>Вернуться назад</span></button>--}}
            <a class="mobile-sidebar__title2-back" ><span>Город</span> <i class="sprite sprite-arrow-down-blue2-min"></i>
            </a>

            <form class="form-search geo-city__search js-prevent" method="POST">
                {{ csrf_field() }}
                <button class="icon-fade" type="submit">
                    <i class="sprite sprite-header__search_active normal"></i>
                    <i class="sprite sprite-search-icon-min active"></i>
                </button>
                <input class="js-geo-city-search" type="search" name="text" placeholder="Найти город..."/>
            </form>

        </div>
    </div>
</div>
<div class="mobile-sidebar js-filter-visible" id="sidebar-filters">
</div>