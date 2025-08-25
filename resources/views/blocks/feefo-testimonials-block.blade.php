@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
        <script type="text/javascript" src="https://api.feefo.com/api/javascript/loanable" async></script>
        <div id="feefo-service-review-carousel-widgetId" class="feefo-review-carousel-widget-service"></div>
    </div>

@unless ($block->preview)
  </section>
@endunless
