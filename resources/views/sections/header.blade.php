<header class="banner relative z-10 border-b bg-white border-blue-50 py-4 lg:py-0">
  <div class="container container-lg">
    <div class="w-full flex flex-wrap lg:flex-nowrap gap-4 lg:gap-8 items-stretch">
      <a class="brand max-w-[120px] lg:max-w-40 flex items-center" href="{{ home_url('/') }}">
        <img src="{{$logo['url']}}" alt="{!! $siteName !!}">
      </a>
      <div class="banner-bottom relative order-1 w-full lg:w-auto lg:order-none lg:ml-auto flex items-center justify-center gap-4 lg:gap-8 pt-4 lg:pt-0">
        @if($feefo_img_desktop)
          <a href="https://www.feefo.com/en-GB/reviews/loanable">
            <img class="hidden lg:block w-[270px] h-[55px]" src="{{ $feefo_img_desktop['url'] }}" alt="{{ $feefo_img_desktop['alt'] }}">
          </a>
        @endif
        @if($feefo_img_mobile)
          <a href="https://www.feefo.com/en-GB/reviews/loanable">
            <img class="md:hidden" src="{{ $feefo_img_mobile['url'] }}" alt="{{ $feefo_img_mobile['alt'] }}">
          </a>
        @endif
      </div>
      <div class="ml-auto lg:ml-0 flex items-stretch gap-8">
        <div class="block lg:hidden mobile-menu_btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="mobile-menu absolute left-0 w-full lg:w-auto lg:relative flex flex-col lg:flex-row items-stretch gap-4 lg:gap-8 lg:order-1">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'header-nav', 'container' => false, 'echo' => false]) !!}
          @if($phone)
            <div class="text-base hidden lg:flex my-auto">
              Call us {{$phone}}
            </div>
            <a href="tel:{{$phone}}" class="btn btn-blue desktop-hidden">
              Call us {{$phone}}
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</header>
