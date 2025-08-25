@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col gap-5 lg:flex-row justify-between text-medium lg:text-[21px]">
        @if($items)
          @forelse($items as $item)
            <div class="w-full lg:w-1/3 gap-2 flex items-center justify-center">
              @if($item['icon'])
                <img src="{{ $item['icon']['url']  }}" alt="{{ $item['icon']['alt']  }}" class="max-w-[17px] lg:max-w-[20px]">
              @endif
              @if($item['text'])
                {{ $item['text'] }}
              @endif
            </div>
          @empty
            <p>No Items</p>
          @endforelse
        @endif
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
