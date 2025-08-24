@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      {!! $code !!}
    </div>

@unless ($block->preview)
  </section>
@endunless
