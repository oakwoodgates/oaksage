<article @php post_class() @endphp>
  @include('partials.page-header')
  <div class="entry-content col-12 col-md-9 col-lg-8 col-xl-6 mx-auto">
  	@include('partials/entry-meta')
    @php the_content() @endphp
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>
