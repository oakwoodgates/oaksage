@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if (bp_is_user())
      @include('partials.content-page')
    @else 
      @include('partials.page-header')
      <div class="container">
        @include('partials.content-page')
      </div>
    @endif 
  @endwhile
@endsection
