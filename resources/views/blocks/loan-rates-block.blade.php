@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col gap-8 lg:flex-row justify-between items-center">
        <div class="w-full lg:w-1/3 text-block">
          @if($title)
            <div class="mb-4">{!! $title !!}</div>
          @endif
          @if($sub_title)
            <p class="text-base lg:text-md">{{ $sub_title }}</p>
          @endif
          @if($link)
            <a href="{{ $link['url'] }}" target="{{ !empty($link['target']) ? $link['target'] : '_self'  }}" class="btn btn-pink min-w-[267px] my-3 lg:mb-6">{{$link['title']}}</a>
          @endif
          @if($description)
            <p class="text-base">{{ $description }}</p>
          @endif
        </div>
        <div class="w-full lg:w-5/12">
          <div class="flex justify-between items-center py-3 lg:py-8 border-b border-blue-50">
            <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/66e3ec2ff8cb87dab720ea9e_SelinaFinance-logo-1.png" alt="">
            <span class="text-pink-600 font-bold text-[21px] lg:text-[26px]">3.4%</span>
          </div>
          <div class="flex justify-between py-4 lg:py-6 border-b border-blue-50">
            <img src="http://loanablemarketing.local/wp-content/uploads/2025/08/Vector-10.svg" alt="">
            <span class="text-pink-600 font-bold text-[21px] lg:text-[26px]">4.2%</span>
          </div>
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
