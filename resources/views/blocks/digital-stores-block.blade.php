@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="bg-blue-600 py-6 px-4 lg:py-16 lg:px-8 rounded-2xl text-white">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
          <div class="w-full lg:w-7/12 text-center lg:text-left">
            <h4 class="font-bold text-[28px] lg:text-4xl lg:mb-4 leading-tight">Get a head start with the loanable app</h4>
            <p class="text-md lg:text-medium">You can speed up the process by downloading the loanable app for your mobile phone.</p>
          </div>
          <div class="w-full lg:w-5/12 flex flex-col justify-center items-center lg:grid grid-cols-2 gap-2 lg:gap-4">
            <a href="#">
              <img src="http://localhost/app/uploads/2025/08/Google_Play_Store_badge_EN-1.svg" class="w-[182px] lg:w-full">
            </a>
            <a href="#">
              <img src="http://localhost/app/uploads/2025/08/Group-48097610.svg" class="w-[182px] lg:w-full">
            </a>
          </div>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
