    @include('templates.partials.header')
    
    <!-- Page Header -->
    @yield('header')
    

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        
        @yield('content')

        </div>
      </div>
    </div>

    @include('templates.partials.footer')
    
