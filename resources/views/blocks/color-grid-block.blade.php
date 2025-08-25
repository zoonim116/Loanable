@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      @if($title)
        <h3 class="mb-8 lg:mb-14 text-center">{!! $title !!}</h3>
      @endif
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6">
        @if($cards)
          @forelse($cards as $card)
            <div class="{{$card['bg_color']}} text-white p-8 lg:p-12 lg:pt-14 text-base lg:text-medium lg:min-h-[580px] rounded-2xl">
              <div class="flex flex-col h-full">
                @if($card['icon'])
                  <div class="h-8 lg:h-10 mb-4 lg:mb-6">
                    <img src="{{ $card['icon']['url'] }}" alt="{{ $card['icon']['alt'] }}" class="max-h-full">
                  </div>
                @endif
                @if($card['card_title'])
                  <p class="br-desktop font-bold text-2xl lg:text-[32px] mb-4 lg:mb-6">{!! $card['card_title'] !!}</p>
                @endif
                @if($card['card_content'])
                  <p>{!! $card['card_content'] !!}</p>
                @endif
                @if($card['card_link'])
                  <a href="{{ $card['card_link']['url'] }}" target="{{ !empty($card['card_link']['target']) ? $card['card_link']['target'] : '_self'  }}" class="btn btn-transparent btn-full mt-10 lg:mt-auto">{{ $card['card_link']['title'] }}</a>
                @endif
              </div>
            </div>
          @empty
            <p>No Cards</p>
          @endforelse
        @endif
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
