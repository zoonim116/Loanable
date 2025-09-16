@unless ($block->preview)
  <section {{ $attributes }}>
@endunless

    <div class="container">
      <div class="flex flex-col gap-8 lg:flex-row justify-between items-center">
        <div class="w-full lg:w-1/2 text-block">
          @if($title)
            <div class="mb-4">{!! $title !!}</div>
          @endif
          @if($sub_title)
            <p class="text-md">{{ $sub_title }}</p>
          @endif
          @if($link)
            <a href="{{ $link['url'] }}" target="{{ !empty($link['target']) ? $link['target'] : '_self'  }}" class="btn btn-pink min-w-[267px] my-3 lg:mb-6">{{$link['title']}}</a>
          @endif
          @if($description)
            <p class="text-md lg:text-base">{{ $description }}</p>
          @endif
        </div>
        <div class="w-full lg:w-1/2 text-md lg:text-[21px]">
          {!! $content !!}
        </div>
      </div>
    </div>

@unless ($block->preview)
  </section>
@endunless
