@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container text-block">
      <h1>Your loan enquiry </br> has been <strong>accepted!</strong></h1>
      <p>Based on the information you have shared with us, you may be eligible for a secured loan.</p>
    </div>

@unless ($block->preview)
  </section>
@endunless
