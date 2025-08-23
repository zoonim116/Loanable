@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 xl:gap-20 text-center">
        <div>
          <p class="font-bold text-2xl lg:text-[40px] mb-2 lg:mb-3">£54 Million</p>
          <p class="text-base lg:text-[21px]">Loans funded this year</p>
        </div>
        <div>
          <p class="font-bold text-2xl lg:text-[40px] mb-2 lg:mb-3">10,500</p>
          <p class="text-base lg:text-[21px]">Happy customers</p>
        </div>
        <div>
          <p class="font-bold text-2xl lg:text-[40px] mb-2 lg:mb-3">400+</p>
          <p class="text-base lg:text-[21px]">Secured loan products</p>
        </div>
        <div>
          <p class="font-bold text-2xl lg:text-[40px] mb-2 lg:mb-3">Exceptional</p>
          <p class="text-base lg:text-[21px]">Feefo service rating</p>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
