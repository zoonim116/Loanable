@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 xl:gap-20 text-center">
        @if($items)
          @forelse ($items as $item)
              <div>
                <p class="font-bold text-2xl lg:text-[40px] mb-2 lg:mb-3">{{ $item['title'] }}</p>
                <p class="text-base lg:text-[21px]">{{ $item['sub_title'] }}</p>
              </div>
          @empty
            <p>No items</p>
          @endforelse
        @endif
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
