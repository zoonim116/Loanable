@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col lg:flex-row lg:justify-between gap-8 lg:items-center">
        <div class="w-full lg:w-1/2">
          @if($left_text)
            <h3>{!! $left_text !!}</h3>
          @endif
        </div>
        <div class="w-full lg:w-1/3 text-md lg:text-[21px]">
          @if($right_text)
            {!! $right_text !!}
          @endif
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
