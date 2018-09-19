@extends('layouts.app')

@section('meta')
<!--<meta property="og:url"                content="" />-->
<meta property="fb:app_id"          content="282629801766929">
<meta property="og:type"           content="article" />
<meta property="og:title"          content="{{ $post->title }}">
<meta property="og:description"    content="{{ $post->subtitle }}">
<meta property="og:image"          content="{{ url($post->image_link) }}">
<meta property="og:image:width"    content="953">
<meta property="og:image:height"   content="960">
@endsection

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ $post->image_link }}')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-heading">
              <h1>{{ $post->title }}</h1>
                <h2 class="subheading">{{ $post->subtitle }}</h2>
                <span class="meta">Posted by
                  <a href="#">{{ $post->name }}</a>
                  on {{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</span>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Post Content -->
      <article>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! $post->content !!}
            </div>
            <div class="col-lg-8 col-md-10 mx-auto">
                <div id="disqus_thread"></div>
            </div>
          </div>
        </div>
      </article>

@endsection

@section('scripts')
        <script>

        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://singkongbutas-com.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
        </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection