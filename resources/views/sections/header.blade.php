<header class="banner relative z-10 border-b bg-white border-blue-50 pt-6 pb-4 lg:py-6">
  <div class="container container-lg">
    <div class="w-full flex flex-wrap lg:flex-nowrap gap-4 lg:gap-8 items-center">
      <a class="brand max-w-[120px] lg:max-w-40" href="{{ home_url('/') }}">
        <img src="{{$logo['url']}}" alt="{!! $siteName !!}">
      </a>
      <div class="banner-bottom relative order-1 w-full lg:w-auto lg:order-none lg:ml-auto flex items-center justify-center gap-4 lg:gap-8 pt-4 lg:pt-0">
        @if($feefo_code)
          {!! $feefo_code !!}
        @endif
      </div>
      <div class="ml-auto lg:ml-0 flex items-center gap-8">
        <div class="block lg:hidden mobile-menu_btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="mobile-menu absolute left-0 w-full lg:w-auto lg:relative flex flex-col lg:flex-row items-center gap-4 lg:gap-8 lg:order-1">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'header-nav', 'container' => false, 'echo' => false]) !!}
          @if($phone)
            <a href="tel:{{$phone}}" class="btn btn-blue">
              Call us {{$phone}}
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</header>
