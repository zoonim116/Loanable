<footer class="content-info bg-gray-200 pt-10 pb-24 lg:py-10">
  <div class="container">
    <div class="flex flex-col lg:flex-row justify-between">
      <div class="w-full lg:w-7/12">
        @if($logo)
          <a class="inline-block w-auto brand max-w-[150px] lg:max-w-[300px]" href="{{ home_url('/') }}">
            <img src="{{ $logo['url'] }}" alt="{{ $siteName }}">
          </a>
        @endif
        @if($footer_text_col_1)
          <div class="text-block text-base lg:text-sm mt-6 leading-relaxed">
            {!! $footer_text_col_1 !!}
          </div>
        @endif
      </div>
      <div class="w-full lg:w-1/5 lg:w-1/6 text-block text-md lg:text-base pt-2">
        @if($footer_text_col_2)
        <p>
          {!! $footer_text_col_2 !!}
        </p>
        @endif
        <p class="no-underline pt-6 pb-6">
          @if($phone)
            <a href="tel:{{$phone}}">{{$phone}}</a> <br/>
          @endif
          @if($email)
            <a href="mailto:{{$email}}">{{$email}}</a>
          @endif
        </p>
        <div class="flex lg:justify-between gap-6 lg:gap-2">
          @if($socials['facebook'])
            <a href="{{$socials['facebook']}}" class="w-8 h-8 bg-blue-600 transition hover:bg-pink-600 rounded-full p-1 flex justify-center items-center">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47 14 5.5 16 5.5H17.5V2.14C17.174 2.097 15.943 2 14.643 2C11.928 2 10 3.657 10 6.7V9.5H7V13.5H10V22H14V13.5Z" fill="white"/>
              </svg>
            </a>
          @endif
          @if($socials['x'])
            <a href="{{$socials['x']}}" class="w-8 h-8 bg-blue-600 transition hover:bg-pink-600 rounded-full p-1 flex justify-center items-center">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <mask id="mask0_65_403" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="20" height="20">
                  <path d="M0.5 0.5H19.5V19.5H0.5V0.5Z" fill="white"/>
                </mask>
                <g mask="url(#mask0_65_403)">
                  <path d="M15.4625 1.39014H18.3763L12.0113 8.68342L19.5 18.6096H13.6371L9.04186 12.5906L3.78971 18.6096H0.873214L7.68064 10.806L0.5 1.39149H6.51214L10.6596 6.89199L15.4625 1.39014ZM14.4379 16.8616H16.0529L5.63 3.04721H3.89829L14.4379 16.8616Z" fill="white"/>
                </g>
              </svg>
            </a>
          @endif
          @if($socials['instagram'])
          <a href="{{$socials['instagram']}}" class="w-8 h-8 bg-blue-600 transition hover:bg-pink-600 rounded-full p-1 flex justify-center items-center">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.8 0H14.2C17.4 0 20 2.6 20 5.8V14.2C20 15.7383 19.3889 17.2135 18.3012 18.3012C17.2135 19.3889 15.7383 20 14.2 20H5.8C2.6 20 0 17.4 0 14.2V5.8C0 4.26174 0.61107 2.78649 1.69878 1.69878C2.78649 0.61107 4.26174 0 5.8 0ZM5.6 2C4.64522 2 3.72955 2.37928 3.05442 3.05442C2.37928 3.72955 2 4.64522 2 5.6V14.4C2 16.39 3.61 18 5.6 18H14.4C15.3548 18 16.2705 17.6207 16.9456 16.9456C17.6207 16.2705 18 15.3548 18 14.4V5.6C18 3.61 16.39 2 14.4 2H5.6ZM15.25 3.5C15.5815 3.5 15.8995 3.6317 16.1339 3.86612C16.3683 4.10054 16.5 4.41848 16.5 4.75C16.5 5.08152 16.3683 5.39946 16.1339 5.63388C15.8995 5.8683 15.5815 6 15.25 6C14.9185 6 14.6005 5.8683 14.3661 5.63388C14.1317 5.39946 14 5.08152 14 4.75C14 4.41848 14.1317 4.10054 14.3661 3.86612C14.6005 3.6317 14.9185 3.5 15.25 3.5ZM10 5C11.3261 5 12.5979 5.52678 13.5355 6.46447C14.4732 7.40215 15 8.67392 15 10C15 11.3261 14.4732 12.5979 13.5355 13.5355C12.5979 14.4732 11.3261 15 10 15C8.67392 15 7.40215 14.4732 6.46447 13.5355C5.52678 12.5979 5 11.3261 5 10C5 8.67392 5.52678 7.40215 6.46447 6.46447C7.40215 5.52678 8.67392 5 10 5ZM10 7C9.20435 7 8.44129 7.31607 7.87868 7.87868C7.31607 8.44129 7 9.20435 7 10C7 10.7956 7.31607 11.5587 7.87868 12.1213C8.44129 12.6839 9.20435 13 10 13C10.7956 13 11.5587 12.6839 12.1213 12.1213C12.6839 11.5587 13 10.7956 13 10C13 9.20435 12.6839 8.44129 12.1213 7.87868C11.5587 7.31607 10.7956 7 10 7Z" fill="white"/>
            </svg>
          </a>
          @endif
          @if($socials['linkedin'])
            <a href="{{$socials['linkedin']}}" class="w-8 h-8 bg-blue-600 transition hover:bg-pink-600 rounded-full p-1 flex justify-center items-center">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.35782 1.77857C3.3576 2.25004 3.1805 2.7021 2.86548 3.03532C2.55047 3.36853 2.12334 3.55559 1.67807 3.55536C1.2328 3.55512 0.805847 3.36761 0.491147 3.03406C0.176448 2.70051 -0.000222427 2.24826 2.10167e-07 1.77679C0.000222847 1.30532 0.177321 0.853255 0.492335 0.520042C0.807349 0.186829 1.23447 -0.000235512 1.67975 2.22531e-07C2.12502 0.000235957 2.55197 0.187753 2.86667 0.521299C3.18137 0.854845 3.35804 1.3071 3.35782 1.77857ZM3.40819 4.87173H0.0503674V16H3.40819V4.87173ZM8.71354 4.87173H5.37251V16H8.67996V10.1603C8.67996 6.90717 12.6842 6.60497 12.6842 10.1603V16H16V8.9515C16 3.46736 10.0735 3.6718 8.67996 6.36498L8.71354 4.87173Z" fill="white"/>
              </svg>
            </a>
           @endif
        </div>
      </div>
    </div>
    <div class="border-t border-blue-50 pt-6 mt-6 text-sm">
      <p>Copyright © Loanable | Secured Loan Specialists {{date('Y')}}. All Rights Reserved.</p>
    </div>
  </div>
  @if($contact_form_id)
    <div class="modal micromodal-slide" id="contact-form" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="contact-form-title" >
          <header class="modal__header flex justify-end">
            <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
          </header>
          <div class="modal__content" id="contact-form-content">
            {!!  do_shortcode('[fluentform id="'.$contact_form_id.'"]') !!}
          </div>
        </div>
      </div>
    </div>
  @endif
  <a href="#contact-form">Modal</a>
</footer>
@if($cta_link)
  <div class="bottom-bar fixed-btn flex md:hidden justify-center p-4 bg-white border-t border-blue-50 fixed bottom-0 left-0 w-full z-10 transition">
    <a href="{{ $cta_link['url'] }}" target="{{ !empty($cta_link['target']) ? $cta_link['target'] : '_self'  }}" class="btn btn-pink font-bold">{{ $cta_link['title'] }}</a>
  </div>
@endif
