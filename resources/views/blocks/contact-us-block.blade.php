@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col lg:flex-row gap-8 lg:gap-6 items-stretch">
        <div class="w-full lg:w-5/12 text-block self-center text-center lg:text-left">
          @if($title)
            {!! $title !!}
          @endif
          @if($subtitle)
            <p>{{ $subtitle }}</p>
          @endif
        </div>
        @if($container_1_text)
          <div class="w-full lg:w-1/4  p-7 lg:py-8 lg:px-5 rounded-2xl border border-pink-600 text-center text-md lg:text-medium text-block font-bold flex flex-col justify-center lg:min-h-[204px]">
            {!! $container_1_text !!}
          </div>
        @endif
        @if($container_2_text)
          <div class="w-full lg:w-1/3  p-7 lg:py-8 lg:px-5 rounded-2xl bg-pink-600 text-white text-left text-medium lg:text-2xl font-bold flex flex-col justify-center lg:min-h-[204px]">
            {!! $container_2_text !!}
          </div>
        @endif
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
