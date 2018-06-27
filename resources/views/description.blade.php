@extends('templates.master')

@section('header')
     <!-- Page Header -->
     <header class="masthead" style="background-image: url({!! asset('assets/img/ipba.jpg') !!})">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-8">
            <div class="post-heading">
                <h3>"Searching and Serving The Best"</h3>
            </div>
          </div>
        </div>
      </div>
    </header>
@endsection()

@section('content')
  <body>
   
    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div>
              <h4>{{$scholarships->name}}</h4>
              {{-- <h2 class="subheading">{{$scholarships->firm}}</h2> --}}
              <span class="meta"><small>Posted on</small>
              {{$scholarships->getDate()}}</span>
          </div>
          <div class=".col-xs-6 .col-sm-8 .col-lg-10">
            
              {{--  .col-xs-6 .col-sm-8 .col-lg-10  --}}
              {!! $scholarships->description !!}
            <div class="form-group">
                <div class="col-md-9 col-md-offset-1">
                  <b>Syarat:</b>
                  <ul>
                    <li>Program     : {{$requirements->program}} </li>
                    <li>Fakultas    : {{$requirements->faculty}} </li>
                    <li>Semester    : {{$requirements->semester}} </li>
                    <li>IPK minimal : {{$requirements->gda}} </li>
                  </ul>
                </div>

            <a href="#">
              <img class="img-fluid" src="{{$scholarships->image}}" alt="">
            </a>

            <p>Placeholder text by
              <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by
              <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p>
          </div>
        </div>
      </div>
    </article>

    <hr>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>
  @endsection()

</html>
