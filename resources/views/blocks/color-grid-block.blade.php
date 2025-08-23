@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <h3 class="mb-8 lg:mb-14 text-center">Contact us <strong>today</strong></h3>
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6">
        <div class="bg-black-800 text-white p-8 lg:p-12 lg:pt-14 text-base lg:text-medium lg:min-h-[580px] rounded-2xl">
          <div class="flex flex-col h-full">
            <div class="h-8 lg:h-10 mb-4 lg:mb-6">
              <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Icon-1.svg" alt="" class="max-h-full">
            </div>
            <p class="br-desktop font-bold text-2xl lg:text-[32px] mb-4 lg:mb-6">Need help? <br/> Call us</p>
            <p>
              Our offices are open <br/>
              9am - 5pm Monday to Friday<br/>
              10am - 4pm Saturday and Sunday
            </p>
            <a href="tel:01539721211" class="btn btn-transparent btn-full mt-10 lg:mt-auto">Call us 01539 721211</a>
          </div>
        </div>
        <div class="bg-pink-600 text-white p-8 lg:p-12 lg:pt-14 text-base lg:text-medium lg:min-h-[580px] rounded-2xl">
          <div class="flex flex-col h-full">
            <div class="h-8 lg:h-10 mb-4 lg:mb-6">
              <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Icon-2.svg" alt="" class="max-h-full">
            </div>
            <p class="br-desktop font-bold text-2xl lg:text-[32px] mb-4 lg:mb-6">Get a personalised <br/> quote</p>
            <p>
              Tell us what you are looking for and  we'll arrange a personalised quote
            </p>
            <a href="#" class="btn btn-transparent btn-full mt-10 lg:mt-auto">Compare Loans</a>
          </div>
        </div>
        <div class="bg-blue-600 text-white p-8 lg:p-12 lg:pt-14 text-base lg:text-medium lg:min-h-[580px] rounded-2xl">
          <div class="flex flex-col h-full">
            <div class="h-8 lg:h-10 mb-4 lg:mb-6">
              <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Icon-3.svg" alt="" class="max-h-full">
            </div>
            <p class="br-desktop font-bold text-2xl lg:text-[32px] mb-4 lg:mb-6">Book an <br/> appointment</p>
            <p>Book an appointment with one of our CeMAP-qualified mortgage advisors</p>
            <a href="#" class="btn btn-transparent btn-full mt-10 lg:mt-auto">Book an appointment</a>
          </div>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
