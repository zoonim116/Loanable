@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8">
        <div class="p-7 lg:p-8 rounded-2xl bg-gray-200 flex flex-col min-h-[172px] lg:min-h-[231px] items-center text-center">
          <div class="h-[44px] lg:h-[72px] flex items-center justify-center mb-4 lg:mb-7">
            <img src="http://localhost/app/uploads/2025/08/check.svg"  class="max-h-full">
          </div>
          <p class="uppercase m-2 font-bold">Loan amount</p>
          <p class="font-bold text-[21px] br-desktop leading-9 lg:text-[32px]">£10,000</p>
        </div>
        <div class="p-7 lg:p-8 rounded-2xl bg-gray-200 flex flex-col min-h-[172px] lg:min-h-[231px] items-center text-center">
          <div class="h-[44px] lg:h-[72px] flex items-center justify-center mb-4 lg:mb-7">
            <img src="http://localhost/app/uploads/2025/08/5.svg"  class="max-h-full">
          </div>
          <p class="uppercase m-2 font-bold">Loan purpose</p>
          <p class="font-bold text-[21px] br-desktop leading-9 lg:text-[32px]">Debt consolidation</p>
        </div>
        <div class="p-7 lg:p-8 rounded-2xl bg-gray-200 flex flex-col min-h-[172px] lg:min-h-[231px] items-center text-center">
          <div class="h-[44px] lg:h-[72px] flex items-center justify-center mb-4 lg:mb-7">
            <img src="http://localhost/app/uploads/2025/08/check-clock.svg"  class="max-h-full">
          </div>
          <p class="uppercase m-2 font-bold">Loan duration</p>
          <p class="font-bold text-[21px] br-desktop leading-9 lg:text-[32px]">3 years</p>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
