<!doctype html>
<html @php language_attributes() @endphp>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    <div class="wrap mx-auto">
      @include('partials.header')
      <div class="content" role="document">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
      @section('footer')
        @php do_action('get_footer') @endphp
        @include('partials.footer')
      @show
    </div>
    @php wp_footer() @endphp
  </body>
</html>
