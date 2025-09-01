@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8">
        <div class="p-7 lg:p-8 rounded-2xl bg-gray-200 flex flex-col min-h-[172px] lg:min-h-[231px] items-center text-center">
          @if($amount_icon)
            <div class="h-[44px] lg:h-[72px] flex items-center justify-center mb-4 lg:mb-7">
              <img src="{{ $amount_icon['url'] }}"  class="max-h-full">
            </div>
          @endif
          @if($amount_title)
            <p class="uppercase m-2 font-bold">{{ $amount_title }}</p>
          @endif
          @if($amount_value)
            <p class="font-bold text-[21px] br-desktop leading-9 lg:text-[32px]">£{{ $amount_value }}</p>
          @endif
        </div>
        <div class="p-7 lg:p-8 rounded-2xl bg-gray-200 flex flex-col min-h-[172px] lg:min-h-[231px] items-center text-center">
          @if($purpose_icon)
            <div class="h-[44px] lg:h-[72px] flex items-center justify-center mb-4 lg:mb-7">
              <img src="{{ $purpose_icon['url'] }}"  class="max-h-full">
            </div>
          @endif
          @if($purpose_title)
            <p class="uppercase m-2 font-bold">{{ $purpose_title }}</p>
          @endif
          @if($purpose_value)
            <p class="font-bold text-[21px] br-desktop leading-9 lg:text-[32px]">{{ $purpose_value }}</p>
          @endif
        </div>
        <div class="p-7 lg:p-8 rounded-2xl bg-gray-200 flex flex-col min-h-[172px] lg:min-h-[231px] items-center text-center">
          @if($duration_icon)
            <div class="h-[44px] lg:h-[72px] flex items-center justify-center mb-4 lg:mb-7">
              <img src="{{ $duration_icon['url'] }}"  class="max-h-full">
            </div>
          @endif
          @if($duration_title)
            <p class="uppercase m-2 font-bold">{{ $duration_title }}</p>
          @endif
          @if($duration_value)
            <p class="font-bold text-[21px] br-desktop leading-9 lg:text-[32px]">{{ $duration_value }}</p>
          @endif
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
