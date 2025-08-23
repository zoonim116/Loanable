@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col lg:flex-row text-white gap-4 lg:gap-6">
        <div class="w-full lg:w-2/3 lg:order-1 rounded-2xl overflow-hidden h-[337px] lg:h-[540px] relative bg-covered">
          <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/ed5a08becb6601069ea073e08b61782808df173f.png" alt="" class="w-full h-full object-cover">
          <div class="absolute left-0 top-0 py-8 px-6 lg:p-10 w-full h-full flex flex-col z-10">
            <div class="flex lg:justify-end mb-2 max-w-1/2 lg:max-w-full">
              <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Vector-12.svg" alt="">
            </div>
            <p class="font-bold text-md lg:text-[32px] mt-auto">With over 400 products and access to every secured lender in the UK, our CeMap-qualified advisors work with you to find the right solution.</p>
          </div>
        </div>
        <div class="w-full lg:w-1/3 bg-pink-600 p-7 lg:pt-14 lg:pb-12 text-block rounded-2xl flex flex-col leading-normal text-md lg:text-medium">
          <p>Whether you’re consolidating debts, funding home improvements, or managing life’s big expenses, our experienced team is here to guide you every step of the way.</p>
          <a href="#" class="btn btn-transparent mt-8 lg:mt-auto">Compare Loans</a>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
