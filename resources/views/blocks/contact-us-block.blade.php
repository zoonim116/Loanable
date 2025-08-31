@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col lg:flex-row gap-8 lg:gap-6 items-stretch">
        <div class="w-full lg:w-5/12 text-block self-center text-center lg:text-left">
          <h3>How we will <strong>contact you</strong></h3>
          <p>Our offices are open:</p>
        </div>
        <div class="w-full lg:w-1/4  p-7 lg:py-8 lg:px-5 rounded-2xl border border-pink-600 text-center text-md lg:text-medium text-block font-bold flex flex-col justify-center lg:min-h-[204px]">
          <p>9am – 8pm Monday to Thursday</p>
          <p>9am – 5pm Friday</p>
          <p>10am – 4pm Saturday & Sunday</p>
        </div>
        <div class="w-full lg:w-1/3  p-7 lg:py-8 lg:px-5 rounded-2xl bg-pink-600 text-white text-center text-medium lg:text-2xl font-bold flex flex-col justify-center lg:min-h-[204px]">
          <p>We’ll contact you on the phone number you have provided, or you can call on 01925 988 055</p>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
