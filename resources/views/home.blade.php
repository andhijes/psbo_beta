@extends('templates.master')

@section('header')
<header class="masthead" style="background-image: url({!! asset('assets/img/home-bg.jpg') !!})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            <h1>Info Beasiswa</h1>
            <span class="subheading">Informasi Beasiswa IPB</span>
            </div>
        </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</header>
@endsection()

@section('content')
  @foreach($readScholarship as $scholarship)
    <section class="section blog-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <div class="blog-posts">
              <div class="post-preview">
                <a href="{{ route('description.viewDescription', $scholarship->id) }}">
                <h3 class="post-subtitle">
                {{$scholarship->name}}
                </h3>
              {{-- <h4 class="post-subtitle"> --}}
                {{$scholarship->firm}}
              {{-- </h4> --}}
                </a>
                <p class="post-meta">Posted by
                {{$scholarship->getDay()}} {{$scholarship->getMonth()}}</p>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endforeach
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
@endsection()
