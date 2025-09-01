@unless ($block->preview)
  <section {{ $attributes }}>
@endunless
    <div class="container text-block ">
        @if($title)
          <div class="accent h1 mb-6">
            {!! $title !!}
          </div>
        @endif
      @if($subtitle)
        {!! $subtitle !!}
      @endif
    </div>
@unless ($block->preview)
  </section>
@endunless
