@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container">

    <div class="welcome-banner">
      <div class="bg" style="background-image: url('@asset('images/welcome.png')')"></div>
      <div class="inner">
        <h2>Discover great places to eat around you in Kazan</h2>
        <div class="search-form">
          <img src="{{ \App\asset_path("images/search.svg") }}" alt="search icon">
          <input type="search" placeholder="Поиск заведений и блюд">
        </div>
      </div>
    </div>
  </div>
  <div class="category-container">
    <div class="container">
      <div class="category-list">
        <div class="btn btn-outline-primary">
          Все
        </div>
        @foreach(get_terms(["taxonomy" => ["kitchen", "category"]]) as $c)
          <div class="btn">
            {{ $c->name }}
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="container py-3 py-lg-5">
    <h2 class="mb-4">Рестораны</h2>
    <div class="row">
      @forelse(App::getPlaces() as $p)
        <div class="col-12 col-md-6 col-lg-4 mb-3 place">
          <div class="row">
            <div class="col-12 mb-2">
              <img src="{{ get_the_post_thumbnail_url($p->ID) }}" alt="{{ $p->post_title }}"
                   class="d-block w-100 thumb">
            </div>
            <div class="col-12">
              <h3>{{ $p->post_title }}</h3>
              <p class="text-muted">{!! App::getFormatedKitchens($p->ID) !!}</p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-muted">
          <h4>Нет данных</h4>
        </div>
      @endforelse
    </div>
{{--    @if (!have_posts())--}}
{{--      <div class="alert alert-warning">--}}
{{--        {{ __('Sorry, no results were found.', 'sage') }}--}}
{{--      </div>--}}
{{--      {!! get_search_form(false) !!}--}}
{{--    @endif--}}

{{--    @while (have_posts()) @php the_post() @endphp--}}
{{--    @include('partials.content-'.get_post_type())--}}
{{--    @endwhile--}}

{{--    {!! get_the_posts_navigation() !!}--}}
  </div>

@endsection
