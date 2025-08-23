@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col lg:flex-row lg:justify-between gap-8 lg:items-center">
        <div class="w-full lg:w-1/3">
          <h3>You should <strong>think carefully</strong> before securing other debts against your home. </h3>
        </div>
        <div class="w-full lg:w-1/3 text-base lg:text-[21px]">
          <p>Consolidating debts could increase the total amount you pay back. Your home may be repossessed if you do not keep up repayments on your mortgage.</p>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
