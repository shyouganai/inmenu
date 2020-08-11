<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <div class="search-form bg-light d-none d-lg-flex">
      <img src="@asset('images/search.svg')" alt="search">
      <input type="search" placeholder="Поиск заведений и блюд">
    </div>
    <div class="actions d-none d-lg-block">
      <div class="btn btn-outline-secondary">Русский <img src="@asset('images/down.svg')" alt="down" width="10"></div>
      <div class="btn btn-outline-primary">Казань <img src="@asset('images/down.svg')" alt="down" width="10"></div>
      <div class="btn btn-outline-secondary">
        <img src="@asset('images/user.svg')" alt="user" width="16" style="margin-top: -3px;">
      </div>
    </div>
    <img src="@asset('images/burger.svg')" alt="burger" width="24" class="d-block d-block d-lg-none">
{{--    <nav class="nav-primary">--}}
{{--      @if (has_nav_menu('primary_navigation'))--}}
{{--        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}--}}
{{--      @endif--}}
{{--    </nav>--}}
  </div>
</header>
