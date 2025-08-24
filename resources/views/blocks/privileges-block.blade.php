@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col gap-5 lg:flex-row justify-between text-medium lg:text-[21px]">
        <div class="w-full lg:w-1/3 gap-2 flex items-center justify-center">
          <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Icon-4.svg" alt="" class="max-w-[17px] lg:max-w-[20px]">
          Rates from 4.2%
        </div>
        <div class="w-full lg:w-1/3 gap-2 flex items-center justify-center">
          <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Icon-5.svg" alt="" class="max-w-[17px] lg:max-w-[20px]">
          No upfront credit checks
        </div>
        <div class="w-full lg:w-1/3 gap-2 flex items-center justify-center">
          <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Icon-6.svg" alt="" class="max-w-[17px] lg:max-w-[20px]">
          Over 400+ products
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
