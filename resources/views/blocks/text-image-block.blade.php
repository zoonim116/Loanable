@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col lg:flex-row items-center gap-8">
        <div class="w-full lg:w-7/12 lg:order-1">
          <div class="flex flex-col gap-6 pstyle-21">
            {!! $content !!}
          </div>
        </div>
        <div class="w-full lg:w-5/12 rounded-2xl overflow-hidden relative max-h-[290px]">
          @if($image)
            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
          @endif
{{--          <div class="absolute max-w-full max-h-full inset-0 flex items-center justify-center z-10">--}}
{{--            <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Vector-12.svg" alt=""  class="max-w-[156px] lg:max-w-[212px]">--}}
{{--          </div>--}}
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
