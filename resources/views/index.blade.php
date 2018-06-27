@extends('templates.master')

@section('header')

    <header class="masthead" style="background-image: url({!! asset('assets/img/ipba.jpg') !!})">
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
    </header>
    
@endsection()

@section('content')

    {{-- <section class="section blog-area">
      <div class="container">
        <div class="row"> --}}
          {{-- <div class="col-md-12 col-sm-12 col-xs-12"> --}}
            <div class="col-md-9 col-sm-9 col-xs-9">
            
              @foreach($readScholarship as $scholarship)
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
              @endforeach
          </div>
          <div class="col-md-1 col-sm-1 col-xs-1">
          </div>
          <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="sidebar-section tags-area">
                    <h4 class="title"><b class="light-color">Tags</b></h4>
                    <ul class="tags">
                        <li><a class="btn" href="#">design</a></li>
                        <li><a class="btn" href="#">fasinon</a></li>
                        <li><a class="btn" href="#">travel</a></li>
                        <li><a class="btn" href="#">music</a></li>
                        <li><a class="btn" href="#">video</a></li>
                        <li><a class="btn" href="#">photography</a></li>
                        <li><a class="btn" href="#">adventure</a></li>
                    </ul>
                </div><!-- sidebar-section tags-area -->
            </div>
          {{-- </div> --}}
        {{-- </div>
      </div>
    </section> --}}
        
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>

@endsection()