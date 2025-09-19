{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')

@section('content')
  <div class="container container-lg pt-8 pb-8 text-block">
    @while(have_posts()) @php(the_post())
      @include('partials.page-header')
      @include('partials.content-page')
    @endwhile
  </div>
@endsection
