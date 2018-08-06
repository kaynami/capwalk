@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('storage/cover.jpg')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="page-heading">
                <h1>About Me</h1>
                <span class="subheading">This is what We do.</span>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Content -->
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            @if(\App\Section::query()->where('name', 'aboutme')->count() > 0)
              {!! \App\Section::query()->where('name', 'aboutme')->get()[0]->description !!}
            @endif
          </div>
        </div>
      </div>

@endsection
