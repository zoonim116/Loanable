@extends('layouts.app')

@section('content')
  <div class="container container-lg pt-8 pb-8">
    @while(have_posts()) @php(the_post())
      @include('partials.page-header')
      @includeFirst(['partials.content-page', 'partials.content'])
    @endwhile
  </div>
@endsection
