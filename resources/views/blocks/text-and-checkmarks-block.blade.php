@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex justify-between items-center flex-col lg:flex-row gap-6">
        <div class="w-full lg:w-1/3 text-block">
          <h3>What happens <strong>next</strong></h3>
          <p>One of our CeMAP qualified advisors will contact you to discuss your options and provide your personalised loan quotes.</p>
          <p class="font-bold text-medium">Information we’ll need from you:</p>
        </div>
        <div class="w-full lg:w-7/12 grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-10">
          <div class="flex flex-col items-center lg:block">
            <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[32px] lg:w-[45px]">
              <path d="M45 23C45 10.5736 34.9263 0.5 22.5 0.5C10.0736 0.5 0 10.5736 0 23C0 35.4263 10.0736 45.5 22.5 45.5C34.9263 45.5 45 35.4263 45 23Z" fill="#315FC3"/>
              <path d="M12.98 25.1728L18.3887 30.5815L30.2877 17.6007" fill="#315FC3"/>
              <path d="M12.98 25.1728L18.3887 30.5815L30.2877 17.6007" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="font-bold text-[21px] lg:text-[24px] lg:mt-3 lg:mb-2">Personal ID</p>
            <p>such as your driving licence or passport</p>
          </div>
          <div class="flex flex-col items-center lg:block">
            <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[32px] lg:w-[45px]">
              <path d="M45 23C45 10.5736 34.9263 0.5 22.5 0.5C10.0736 0.5 0 10.5736 0 23C0 35.4263 10.0736 45.5 22.5 45.5C34.9263 45.5 45 35.4263 45 23Z" fill="#315FC3"/>
              <path d="M12.98 25.1728L18.3887 30.5815L30.2877 17.6007" fill="#315FC3"/>
              <path d="M12.98 25.1728L18.3887 30.5815L30.2877 17.6007" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="font-bold text-[21px] lg:text-[24px] lg:mt-3 lg:mb-2">Proof of income</p>
            <p>3 months’ payslips or 2 years tax returns if self employed</p>
          </div>
          <div class="flex flex-col items-center lg:block">
            <svg width="45" height="46" viewBox="0 0 45 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-[32px] lg:w-[45px]">
              <path d="M45 23C45 10.5736 34.9263 0.5 22.5 0.5C10.0736 0.5 0 10.5736 0 23C0 35.4263 10.0736 45.5 22.5 45.5C34.9263 45.5 45 35.4263 45 23Z" fill="#315FC3"/>
              <path d="M12.98 25.1728L18.3887 30.5815L30.2877 17.6007" fill="#315FC3"/>
              <path d="M12.98 25.1728L18.3887 30.5815L30.2877 17.6007" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="font-bold text-[21px] lg:text-[24px] lg:mt-3 lg:mb-2">Proof of address</p>
            <p>such as a utility bill</p>
          </div>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
