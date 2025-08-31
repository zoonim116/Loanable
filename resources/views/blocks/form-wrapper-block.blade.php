@unless ($block->preview)
  <section {{ $attributes }}>
@endunless
    @if($shortcode)
      <div class="container">
        {!! do_shortcode($shortcode) !!}
      </div>
    @endif

<div>
  <InnerBlocks template="{{ $block->template }}" />
</div>

@unless ($block->preview)
  </section>
@endunless
