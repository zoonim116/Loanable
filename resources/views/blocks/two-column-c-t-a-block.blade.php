@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col lg:flex-row text-white gap-4 lg:gap-6">
        <div class="w-full lg:w-2/3 lg:order-1 rounded-2xl overflow-hidden h-[337px] lg:h-[540px] relative bg-covered">
          @if($image)
            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-full h-full object-cover">
          @endif
          <div class="absolute left-0 top-0 py-8 px-6 lg:p-10 w-full h-full flex flex-col z-10">
            <div class="flex lg:justify-end mb-2 max-w-1/2 lg:max-w-full">
              @if($logo)
                <img src="{{ $logo['url'] }}" alt="{{ $logo['alt'] }}">
              @endif
            </div>
            @if($right_text)
              <p class="font-bold text-md lg:text-[32px] mt-auto">{{ $right_text }}</p>
            @endif
          </div>
        </div>
        <div class="w-full lg:w-1/3 bg-pink-600 p-7 lg:pt-14 lg:pb-12 text-block rounded-2xl flex flex-col leading-normal text-md lg:text-medium">
          @if($left_text)
            <p>{{ $left_text }}</p>
          @endif
          @if($link)
            <a href="{{ $link['url'] }}" class="btn btn-transparent mt-8 lg:mt-auto">{{ $link['title'] }}</a>
          @endif
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
