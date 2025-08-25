@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col lg:flex-row items-center gap-8">
        <div class="w-full lg:w-7/12 lg:order-1">
          <div class="flex flex-col gap-6 pstyle-21">
            <h3>A secured loan, often referred to as a <strong>second charge mortgage</strong>, is a type of borrowing that uses your home as collateral.</h3>
            <p>Unlike a standard mortgage, which is usually taken out when you buy a property, a secured loan is an additional agreement that sits alongside your existing mortgage. It allows you to borrow a lump sum while keeping your original mortgage in place.</p>
          </div>
        </div>
        <div class="w-full lg:w-5/12 rounded-2xl overflow-hidden bg-covered relative max-h-[290px]">
          <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/c5a5c2c5e8b63ccf6f374e6518f666c0137c04bd.png" alt="">
          <div class="absolute max-w-full max-h-full inset-0 flex items-center justify-center z-10">
            <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Vector-12.svg" alt=""  class="max-w-[156px] lg:max-w-[212px]">
          </div>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
