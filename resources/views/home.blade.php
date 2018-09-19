@extends('layouts.app')

@section('content')
        <!-- Page Header -->
        <header class="masthead" style="background-image: url('storage/silhouette.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                    <h1>Singkong Butas</h1>
                    <span class="subheading">Eat. Travel. Laugh.</span>
                    </div>
                </div>
                </div>
            </div>
        </header>

            <!-- Main Content -->
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    @foreach($posts as $item)
                        <div class="post-preview">
                            <a href="{{ route('homepage.post', [$item->type, $item->pointer]) }}" title="{{ $item->title }}">
                                <h2 class="post-title">
                                    {{ $item->title }}
                                </h2>
                                <h3 class="post-subtitle">
                                    {{ $item->subtitle }}
                                </h3>
                            </a>
                            <center>
                            <a href="{{ $item->image_link }}"
                                title="{{ $item->title }}">
                                <img src="{{ $item->image_link }}"
                                alt="{{ $item->title }}" width="100%" height="350">
                            </a>
                            </center>
                            <p class="post-meta">Posted by
                                <a href="#">{{ $item->name }}</a>
                                on {{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y') }}
                                <a href="{{ route('homepage.post', [$item->type, $item->pointer]) }}#disqus_thread" title="{{ $item->title }}">
                            </p>
                        </div>
                        <hr>
                    @endforeach
                    <!-- Pager -->
                    <div class="clearfix">
                        @if($posts->firstItem() == '')
                            <label> Sorry, No post yet. :( </label>
                        @endif
                        @if($posts->firstItem() != 1 && $posts->firstItem() != '')
                            <a class="btn btn-primary float-left" href="{{ $posts->previousPageUrl() }}">&larr; Newer Posts </a>
                        @endif
                        @if($posts->lastPage() != $posts->currentPage())
                            <a class="btn btn-primary float-right" href="{{ $posts->nextPageUrl() }}">Older Posts &rarr;</a>
                        @endif
                    </div>
                </div>
            </div>
            </div>
@endsection
