@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col lg:flex-row justify-between">
        <div class="w-full lg:w-1/3 flex flex-col gap-4 items-start mb-8">
          @if($title)
            {!! $title !!}
          @endif
          <div class="hidden lg:block">
            @if($subtitle)
              {!! $subtitle !!}
            @endif
            @if($link)
                <a href="{{ $link['url'] }}" target="{{ !empty($link['target']) ? $link['target'] : '_self'  }}" class="btn btn-pink mt-4 lg:min-w-[271px] font-bold">{{ $link['title'] }}</a>
            @endif
          </div>
        </div>
        <div class="faq-list w-full lg:w-5/12 flex flex-col gap-3">
          @if($items)
            @foreach($items as $item)
              <div class="faq-item {{ $loop->first ? 'active' : '' }} transition-all border rounded-4xl py-4 px-6">
                <div class="faq-item_title flex justify-between gap-2 font-bold cursor-pointer text-medium lg:text-md">
                  {{$item['title']}}
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="12" fill="#3A4969"/>
                    <path d="M15.4282 10.7656L12.2844 14.0665C12.2476 14.1069 12.2034 14.139 12.1545 14.161C12.1055 14.1829 12.0529 14.1942 11.9996 14.1942C11.9464 14.1942 11.8937 14.1829 11.8448 14.161C11.7959 14.139 11.7517 14.1069 11.7148 14.0665L8.57108 10.7656" fill="#3A4969"/>
                    <path d="M15.4282 10.7656L12.2844 14.0665C12.2476 14.1069 12.2034 14.139 12.1545 14.161C12.1055 14.1829 12.0529 14.1942 11.9996 14.1942C11.9464 14.1942 11.8937 14.1829 11.8448 14.161C11.7959 14.139 11.7517 14.1069 11.7148 14.0665L8.57108 10.7656" stroke="white" stroke-width="0.96" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </div>
                <div class="faq-item_text text-md lg:text-base">
                  {!! $item['content'] !!}
                </div>
              </div>
            @endforeach
          @endif
        </div>
        <div class="block lg:hidden mt-8">
          @if($subtitle)
            {!! $subtitle !!}
          @endif
          @if($link)
            <a href="{{ $link['url'] }}" target="{{ !empty($link['target']) ? $link['target'] : '_self'  }}" class="btn btn-pink mt-4 lg:min-w-[271px]">{{ $link['title'] }}</a>
          @endif
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
