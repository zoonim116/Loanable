@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <div class="container container-lg pt-8 pb-8 text-block">
        <x-alert type="warning">
          {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
        </x-alert>
      </div>
  @endif
@endsection
