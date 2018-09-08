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
          </div>
        </div>
      </article>

@endsection
