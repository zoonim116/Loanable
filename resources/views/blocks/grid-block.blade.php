@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      @if($title)
        <div class="mb-6 lg:mb-12 text-center lg:text-left">{!! $title !!}</div>
      @endif
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8">
        @if($cards)
          @forelse($cards as $card)
            @if($card['accent_card'])
              <div class="items-center text-center p-7 lg:p-8 rounded-2xl bg-blue-600 text-white justify-center flex flex-col min-h-[207px] lg:min-h-[273px]">
                @if($card['title'])
                  <p class="font-bold text-2xl lg:text-[28px]">{!! $card['title'] !!}</p>
                @endif
                  @if($card['link'])
                    <a href="{{ $card['link']['url'] }}" target="{{ !empty($card['link']['target']) ? $card['link']['target'] : '_self'  }}" class="btn btn-transparent btn-full mt-8 font-bold">{{ $card['link']['title'] }}</a>
                  @endif
              </div>
            @else
              <div @class([
                        'p-7 lg:p-8 rounded-2xl bg-gray-200 flex flex-col min-h-[207px] lg:min-h-[273px]',
                        'items-start text-left' => $card['align'] == 'left',
                        'items-center text-center' => $card['align'] == 'center'
                ])>
                <div class="h-[44px] lg:h-[72px] flex items-center justify-center mb-4 lg:mb-7">
                  @if($card['icon'])
                    <img src="{{ $card['icon']['url'] }}" alt="{{ $card['icon']['alt'] }}" class="max-h-full">
                  @endif
                </div>
                @if($card['title'])
                  <p @class([
                        'font-bold text-[21px] br-desktop leading-9',
                        'lg:text-2xl' => $card['align'] == 'center',
                        'lg:text-[32px]' => $card['align'] == 'left'
                    ])>
                    {!! $card['title'] !!}
                  </p>
                @endif
                @if($card['description'])
                  <div @class([
                      'text-block mt-6',
                      'lg:text-[21px]' => $card['align'] == 'center',
                      'grid-text' => $card['align'] == 'left'
                    ])>
                    {!! $card['description'] !!}
                  </div>
                @endif
                @if($card['link'])
                 <a href="{{ $card['link']['url'] }}" target="{{ !empty($card['link']['target']) ? $card['link']['target'] : '_self'  }}" class="custom-underline uppercase mt-auto font-bold">{{ $card['link']['title'] }}</a>
                @endif
              </div>
            @endif
            @empty
              <p>No Cards</p>
          @endforelse

        @endif

      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
