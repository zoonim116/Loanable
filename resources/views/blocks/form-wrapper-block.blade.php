@unless ($block->preview)
  <div {{ $attributes }}>
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
  </div>
@endunless
