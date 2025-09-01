@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="bg-blue-600 py-6 px-4 lg:py-16 lg:px-8 rounded-2xl text-white">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
          <div class="w-full lg:w-7/12 text-center lg:text-left">
            @if($title)
              <h4 class="font-bold text-[28px] lg:text-4xl lg:mb-4 leading-tight">{{ $title }}</h4>
            @endif
            @if($subtitle)
              <p class="text-md lg:text-medium">{{ $subtitle }}</p>
            @endif
          </div>
          @if($items)
            <div class="w-full lg:w-5/12 flex flex-col justify-center items-center lg:grid grid-cols-2 gap-2 lg:gap-4">
              @foreach($items as $item)
                @if($item['link'])
                  <a href="{{ $item['link']['url'] }}" target="{{ !empty($item['link']['target']) ? $item['link']['target'] : '_self'  }}">
                @endif
                @if($item['image'])
                  <img src="{{ $item['image']['url'] }}" class="w-[182px] lg:w-full">
                @endif
                @if($item['link'])
                  </a>
                @endif
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
